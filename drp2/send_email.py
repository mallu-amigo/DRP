import requests
from bs4 import BeautifulSoup
import re
import mysql.connector
import smtplib
from email.mime.text import MIMEText
from datetime import datetime

# Database Connection
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="drp"
)
cursor = db.cursor()

# Email Configuration
SMTP_SERVER = "smtp.gmail.com"
SMTP_PORT = 587
EMAIL_SENDER = "aromaltrader003@gmail.com"  # Replace with your email
EMAIL_PASSWORD = "ojgj nqsa jyob cswp"  # Use an app password or enable less secure apps

# Function to send email
def send_email(subject, message, recipients):
    msg = MIMEText(message, "plain")
    msg["Subject"] = subject
    msg["From"] = EMAIL_SENDER
    msg["To"] = ", ".join(recipients)
    
    try:
        with smtplib.SMTP(SMTP_SERVER, SMTP_PORT) as server:
            server.starttls()
            server.login(EMAIL_SENDER, EMAIL_PASSWORD)
            server.sendmail(EMAIL_SENDER, recipients, msg.as_string())
        print("✅ Email notifications sent successfully!")
    except Exception as e:
        print("❌ Error sending email:", e)

# URL of the page to scrape
url = "https://sdma.kerala.gov.in/rainfall-2/"

# Get the current date
current_date = datetime.now().strftime("%d/%m/%Y")
mysql_alert_date = datetime.strptime(current_date, "%d/%m/%Y").strftime("%Y-%m-%d")

# Send request
response = requests.get(url)
response.encoding = "utf-8"
soup = BeautifulSoup(response.text, "html.parser")

# Find main content
div = soup.find("div", class_="xdj266r x11i5rnm xat24cr x1mh8g0r x1vvkbs x126k92a")
if not div:
    print("Error: Could not find alert div.")
    exit()

# Alert dictionary
alerts = {"Red Alert": [], "Orange Alert": [], "Yellow Alert": []}

date_pattern = re.compile(r"\d{2}/\d{2}/\d{4}:")
text_content = div.get_text(" ", strip=True)
matches = date_pattern.finditer(text_content)

for match in matches:
    date_found = match.group(0).strip(":")
    if date_found != current_date:
        continue
    
    start_index = match.end()
    remaining_text = text_content[start_index:]
    end_index = remaining_text.find("എന്നീ")
    
    if end_index != -1:
        district_text = remaining_text[:end_index].strip()
        districts = [d.strip() for d in district_text.split(",")]
        
        if "റെഡ് അലർട്ട്" in remaining_text:
            alerts["Red Alert"].extend(districts)
        elif "ഓറഞ്ച് അലർട്ട്" in remaining_text:
            alerts["Orange Alert"].extend(districts)
        elif "മഞ്ഞ അലർട്ട്" in remaining_text:
            alerts["Yellow Alert"].extend(districts)

# Process alerts
new_alerts = []
for alert_type, districts in alerts.items():
    if districts:
        district_string = ", ".join(districts).strip()

        # Check if alert exists
        cursor.execute("""
            SELECT id FROM alerts 
            WHERE alert_type = %s 
            AND LOWER(districts) = LOWER(%s) 
            AND alert_date = %s
        """, (alert_type, district_string, mysql_alert_date))
        
        if not cursor.fetchone():
            # Insert into database
            cursor.execute("""
                INSERT INTO alerts (alert_type, districts, alert_date, scraped_at) 
                VALUES (%s, %s, %s, NOW())
            """, (alert_type, district_string, mysql_alert_date))
            db.commit()
            
            # Store new alerts for notification
            new_alerts.append(f"{alert_type} in {district_string}")
            print(f"✅ Inserted: {alert_type} -> {district_string}")

# Send notifications if new alerts exist
if new_alerts:
    cursor.execute("SELECT email FROM users")
    user_emails = [row[0] for row in cursor.fetchall()]
    
    if user_emails:
        subject = "New Weather Alert from KSDMA"
        message = "\n".join(new_alerts)
        send_email(subject, message, user_emails)
    else:
        print("⚠️ No registered users found for email notifications.")

# Close DB connection
cursor.close()
db.close()