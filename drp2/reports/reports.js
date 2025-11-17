//coding the menu side bar

var menu = document.getElementById('menu_icon');
menu.addEventListener('click', function () {
    var sidebar = document.getElementsByClassName('side_bar')[0];
    sidebar.classList.remove('animate__slideOutLeft');
    sidebar.classList.add('animate__slideInLeft');
    sidebar.style.display = 'block';
    document.getElementsByClassName('overlay')[0].style.display = 'block';
    document.body.style.overflow = 'hidden';

});

document.getElementById('close_icon').addEventListener('click', function () {

    var sidebar = document.getElementsByClassName('side_bar')[0];
    sidebar.classList.remove('animate__slideInLeft');
    sidebar.classList.add('animate__slideOutLeft');
    document.body.style.overflow = 'auto';

    setTimeout(function () {
        sidebar.style.display = 'none';
        document.getElementsByClassName('overlay')[0].style.display = 'none';

    }, 300);

});

//coding the side bar menu items

//volunteer

var vol = document.getElementsByClassName('volunteer')[0];
var side_bar = document.getElementsByClassName('overlay')[0];
vol.addEventListener('click', function () {
    window.location.href = '../home/home.php#volunteer_section';
    side_bar.style.display = 'none';

});

//contact

var contact = document.getElementsByClassName('contact')[0];
contact.addEventListener('click', function () {
    window.location.href = '#footer';
    side_bar.style.display = 'none';
    document.body.style.overflow = 'auto';
});

//home

var home = document.getElementsByClassName('home')[0];
home.addEventListener('click', function () {
    window.location.href = '../home/home.php';
    var side_bar = document.getElementsByClassName('overlay')[0];
    side_bar.style.display = 'none';
})

//donate

var home = document.getElementsByClassName('donate')[0];
home.addEventListener('click', function () {
    window.location.href = '../donation/donation.php';
    side_bar.style.display = 'none';
    document.body.style.overflow = 'auto';

})


//repoting disaster

var report = document.getElementsByClassName('report_disaster')[0];
report.addEventListener('click', function () {
    alert('You are already in the reporting page');
})


///fetching all the reports from the database

document.addEventListener('DOMContentLoaded', function () {
    fetch('../reports/fetchAllReports.php')
        .then(response => response.json())
        .then(data => {
            let container = document.querySelector('.disasters');
            container.innerHTML = ''; //this will clear the container before adding the new data

            data.forEach(report => {
                let card = `
                  <div class="card1">
                    <div class="image">
                    <img src="${report.file}" alt="Disaster Image" class="disaster-image">
                    </div>
                    <div class="information">
                       <h2 class="disaster_name">${report.title}</h2>
                       <span class= "disaster_location">
                          <i class="fa fa-location-dot" aria-hidden= "true"></i>
                          ${report.location_input}
                       </span>
                       <span class= "disaster_date">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        ${new Date(report.datetime).toLocaleDateString()}
                       </span>
                        <input type="submit" value="View Details" class="view_report" onclick="viewDetails(${report.id})">
                    </div>
                 </div>
                            `;
                container.innerHTML += card;

            })
        });

});

//coding the disaster details pop up box

function viewDetails(id) {
    document.querySelector('#view_details_overlay').style.display = 'block';

    fetch(`../reports/popup.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('imagViewDetails').src = data.file;
            document.getElementById('disasterTitle').innerText = `Title: ${data.title}`;
            document.getElementById('disasterDescription').innerText = `Description: ${data.description}`;
            document.getElementById('disasterDate').innerHTML = `<i class="fa fa-calendar"></i> ${new Date(data.datetime).toLocaleDateString()}`;
            document.getElementById('urgencyLevel').innerText = `Urgency Level: ${data.urgency}`;
            document.getElementById('reporterName').innerHTML = `<span style="margin-left: 5px;">${data.user_name}</span>`;

            let contactLink = data.user_contact.includes('@') ? `mailto:${data.user_contact}` : `tel:${data.user_contact}`;

            document.getElementById('reporterEmailorPhone').innerHTML = `<a href="${contactLink}">${data.user_contact}</a>`;

            // Location Handling
            let locationField = document.getElementById('disasterLocation');
            let locationInput = data.location_input.trim();
            let googleMapsLink = '';

            if (locationInput.match(/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?),\s*[-+]?(180(\.0+)?|((1[0-7]\d)|(\d{1,2}))(\.\d+)?)$/)) {
                let [lat, lon] = locationInput.split(',').map(coord => coord.trim());
                googleMapsLink = `https://www.google.com/maps?q=${lat},${lon}`;
            }

            if (googleMapsLink) {
                locationField.innerHTML = `<a href="${googleMapsLink}" target="_blank"><i class="fa fa-location-dot"></i> View on Google Maps</a>`;
            } else {
                locationField.innerHTML = `<i class="fa fa-location-dot"></i> ${locationInput}`;
            }

        })
}

document.querySelector('#view_details_close_icon').addEventListener('click', function () {
    document.querySelector('#view_details_overlay').style.display = 'none';

})