import requests
from bs4 import BeautifulSoup
import re
try:
    import mysql.connector
except ImportError:
    raise ImportError("mysql.connector not found. Install it with: pip install mysql-connector-python")
from datetime import datetime

# Database Connection
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="drp"
)
cursor = db.cursor()

# URL of the page to scrape
url = "https://sdma.kerala.gov.in/rainfall-2/"

# Get the current date in the format used on KSDMA site (DD/MM/YYYY)
fetch_date = datetime.now().strftime("%d/%m/%Y")  # Format: DD/MM/YYYY for website matching
today_date = datetime.now().strftime("%Y-%m-%d")  # Format: YYYY-MM-DD for database storage

# Send a request and get the HTML content
response = requests.get(url)
response.encoding = "utf-8"
html_content = response.text

# Parse the HTML
soup = BeautifulSoup(html_content, "html.parser")

# Extract text content from the entire page
text_content = soup.get_text(" ", strip=True)

# Regular expression to match the date and extract associated districts
pattern = re.compile(rf"{fetch_date}\s*:\s*([\u0D00-\u0D7F, ]+)")

# Search for the target date
match = pattern.search(text_content)

if match:
    district_text = match.group(1).strip()
    districts = [d.strip() for d in district_text.split(",")]

    # Dictionary to translate Malayalam district names to English
    district_translation = {
        "തിരുവനന്തപുരം": "Thiruvananthapuram",
        "കൊല്ലം": "Kollam",
        "പത്തനംതിട്ട": "Pathanamthitta",
        "ആലപ്പുഴ": "Alappuzha",
        "കോട്ടയം": "Kottayam",
        "ഇടുക്കി": "Idukki",
        "എറണാകുളം": "Ernakulam",
        "തൃശ്ശൂർ": "Thrissur",
        "പാലക്കാട്": "Palakkad",
        "മലപ്പുറം": "Malappuram",
        "കോഴിക്കോട്": "Kozhikode",
        "വയനാട്": "Wayanad",
        "കണ്ണൂർ": "Kannur",
        "കാസർഗോഡ്": "Kasaragod"
    }

    # Convert district names to English
    translated_districts = [district_translation.get(d, d) for d in districts]
    
    # Print the extracted data
    print(f"Date (Alert Date): {fetch_date}")
    print(f"Scraped On: {today_date}")
    print(f"Yellow Alert Districts: {', '.join(translated_districts)}")

    # Insert into database
    alert_type = "Yellow Alert"
    district_string = ", ".join(translated_districts)

    cursor.execute(
        """
        SELECT id FROM alerts 
        WHERE alert_type = %s 
        AND LOWER(districts) = LOWER(%s) 
        AND alert_date = %s
        """,
        (alert_type, district_string, fetch_date)
    )
    existing_alert = cursor.fetchone()

    if not existing_alert:
        cursor.execute(
            """
            INSERT INTO alerts (alert_type, districts, alert_date, scraped_at) 
            VALUES (%s, %s, %s, %s)
            """,
            (alert_type, district_string, fetch_date, today_date)
        )
        db.commit()
        print(f"✅ Inserted: {alert_type} -> {district_string} on {fetch_date}")
    else:
        print(f"⚠️ Duplicate alert found: {alert_type} -> {district_string} on {fetch_date} (Skipping)")

else:
    print(f"⚠️ No alerts found for {fetch_date}")

# Close DB Connection
cursor.close()
db.close()
