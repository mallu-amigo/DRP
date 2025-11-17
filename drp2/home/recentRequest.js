async function recentReports() {
    let response = await fetch('../resourcesForm/fetchRequest.php');
    let data = await response.json();

    console.log(data); // Debugging: Check if two reports are fetched

    if (data.length > 0) {
        // Latest report
        if (data[0]) {
            document.getElementsByClassName('resource_name')[0].innerHTML = `<i class="fa fa-cube" aria-hidden="true"></i>${data[0].title}`;
            document.getElementsByClassName('resource_location')[0].innerHTML = `<i class="fa fa-location-dot"></i> ${data[0].location_input}`;
            document.getElementsByClassName('resource_description')[0].innerHTML = data[0].description



        }

        // Second latest report
        if (data[1]) {
            document.getElementsByClassName('resource_name2')[0].innerHTML = `<i class="fa fa-cube" aria-hidden="true"></i>${data[1].title}`;
            document.getElementsByClassName('resource_location2')[0].innerHTML = `<i class="fa fa-location-dot"></i> ${data[1].location_input}`;
            document.getElementsByClassName('resource_description2')[0].innerHTML = data[1].description;
        }
    } else {
        console.error('No data found');
    }
}


recentReports();



document.querySelectorAll('#view_resource_details').forEach(button => {
    button.addEventListener('click', async function () {
        document.getElementById('view_details_overlay').style.display = 'block';
        document.body.style.overflow = 'hidden';

        let response = await fetch('../resourcesForm/fetchRequest.php');
        let data = await response.json();

        console.log(data); // Debugging: Check if reports are fetched correctly

        // Get the ID of the clicked button
        let reportIndex = parseInt(this.getAttribute('data-id')) - 1;

        // Make sure the report exists in the fetched data
        if (data[reportIndex]) {
            let report = data[reportIndex];

            document.getElementById('disasterTitle').innerText = `Title: ${report.title}`;
            document.getElementById('disasterDescription').innerHTML = `Description: ${report.description}`;
            document.getElementById('disasterDate').innerHTML = ` <i class="fa fa-calendar"></i> ${new Date(report.datetime).toLocaleDateString()}`;
            document.getElementById('imagViewDetails').src = report.file;
            document.getElementById('urgencyLevel').innerText = `Urgency Level: ${report.urgency}`;
            document.getElementById('reporterName').innerHTML = `
            <span style="margin-left: 5px;">${report.user_name}</span>`;

            let contactLink = report.user_contact.includes('@') ? `mailto:${report.user_contact}` : `tel:${report.user_contact}`;

            document.getElementById('reporterEmailorPhone').innerHTML = `
            <a href="${contactLink}">${report.user_contact}</a>`;


            // Location Handling
            let locationField = document.getElementById('disasterLocation');
            let locationInput = report.location_input.trim();

            let googleMapsLink = '';

            if (locationInput.match(/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?),\s*[-+]?(180(\.0+)?|((1[0-7]\d)|(\d{1,2}))(\.\d+)?)$/)) {
                // ✅ If the input is in lat,long format → Show Google Maps
                let [lat, lon] = locationInput.split(',').map(coord => coord.trim());
                googleMapsLink = `https://www.google.com/maps?q=${lat},${lon}`;
            }

            // If lat/long is present, show Google Maps link
            if (googleMapsLink) {
                locationField.innerHTML = `<a href="${googleMapsLink}" target="_blank"><i class="fa fa-location-dot"></i> View on Google Maps</a>`;
            } else {
                // ❌ If it's a place name, don't show the Google Maps link
                locationField.innerHTML = `<i class="fa fa-location-dot"></i> ${locationInput}`;
            }
        } else {
            console.error('No data found for the selected disaster');
        }
    });
});



document.getElementById('view_details_close_icon').addEventListener('click', function () {
    document.getElementById('view_details_overlay').style.display = 'none';
    document.body.style.overflow = 'auto';
})
