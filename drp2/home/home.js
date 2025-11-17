//checks if the user already logged in or not and updates the innertext inside the login_signup button
document.addEventListener("DOMContentLoaded", function () {
    let loginIcon = document.querySelector('.login_icon');
    let logoutIcon = document.querySelector('.logout_icon');

    function openLoginPopup() {
        document.getElementsByClassName('login_form_overlay')[0].style.display = 'block';
        document.getElementsByClassName('login_form_box')[0].style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    function handleLogout() {
        localStorage.removeItem('login'); 
        window.location.href = '../home/logout.php'; 
    }

    // Check if user is logged in
    if (localStorage.getItem('login') === 'true') {
        loginIcon.style.display = 'none';  // Hide login icon
        logoutIcon.style.display = 'flex'; // Show logout icon
        logoutIcon.addEventListener('click', handleLogout);
    } else {
        loginIcon.style.display = 'flex';  // Show login icon
        logoutIcon.style.display = 'none'; // Hide logout icon
        loginIcon.addEventListener('click', openLoginPopup);
    }
});



if (!localStorage.getItem('firstVisit')) {
    if (confirm('Welcome to DRP! To get notifications about the recent disasters and alerts, please login or signup.')) {
        document.getElementsByClassName('login_form_overlay')[0].style.display = 'block';
        document.getElementsByClassName('login_form_box')[0].style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    localStorage.setItem('firstVisit', 'true');
}

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


//login form coding

var login = document.getElementsByClassName('login_icon')[0];
login.addEventListener('click', function () {
    document.getElementsByClassName('login_form_overlay')[0].style.display = 'block';
    document.getElementsByClassName('login_form_box')[0].style.display = 'block';
    document.body.style.overflow = 'hidden';
});

var login_close = document.getElementById('login_close_icon');
login_close.addEventListener('click', function () {
    document.getElementsByClassName('login_form_overlay')[0].style.display = 'none';
    document.getElementsByClassName('login_form_box')[0].style.display = 'none';
    document.body.style.overflow = 'auto';
});


//signup form coding

var signup_close = document.getElementById('signup_close_icon');
signup_close.addEventListener('click', function () {
    document.getElementsByClassName('signup_form_overlay')[0].style.display = 'none';
    document.getElementsByClassName('signup_form_box')[0].style.display = 'none';
    document.body.style.overflow = 'auto';
});

//switiching the login and signup forms

var login_overlay = document.getElementsByClassName('login_form_overlay')[0];
var login_form = document.getElementsByClassName('login_form_box')[0];
var signup_overlay = document.getElementsByClassName('signup_form_overlay')[0];
var signup_form = document.getElementsByClassName('signup_form_box')[0];

document.getElementById('login_link').addEventListener('click', function () {
    login_overlay.style.display = 'none';
    login_form.style.display = 'none';
    signup_overlay.style.display = 'block';
    signup_form.style.display = 'block';

});

document.getElementById('signup_link').addEventListener('click', function () {
    login_overlay.style.display = 'block';
    login_form.style.display = 'block';
    signup_overlay.style.display = 'none';
    signup_form.style.display = 'none';
});



//coding the side bar menu items

//volunteer

var vol = document.getElementsByClassName('volunteer')[0];
var side_bar = document.getElementsByClassName('overlay')[0];
vol.addEventListener('click', function () {
    window.location.href = '#volunteer_section';
    side_bar.style.display = 'none';
    document.body.style.overflow = 'auto';

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
    window.location.href = '#hero';
    side_bar.style.display = 'none';
    document.body.style.overflow = 'auto';
})

//report

var report = document.getElementsByClassName('report_disaster')[0];
report.addEventListener('click', function () {
    window.location.href = '../report_disaster/reporting.php';
    side_bar.style.display = 'none';
    document.body.style.overflow = 'auto';
});

//donate

var home = document.getElementsByClassName('donate')[0];
home.addEventListener('click', function () {
    window.location.href = '../donation/donation.php';
    side_bar.style.display = 'none';
    document.body.style.overflow = 'auto';

})

//admin page

document.getElementsByClassName('adminpage')[0].addEventListener('click', function() {
    let adminCode = prompt('Enter the admin code:');
    if (adminCode === 'admindrp') {
        alert('Login success!');
        window.location.href = '../adminPage/home.php';
    } else {
        alert('Wrong password. Login failed.');
    }
});


//coding the volunteer form

var close = document.getElementById('vol_close_icon');
close.addEventListener('click', function () {
    document.getElementsByClassName('vol_form_overlay')[0].style.display = 'none';
    document.body.style.overflow = 'auto';
});

var vol_btn = document.getElementById('volunteer_button');
vol_btn.addEventListener('click', function () {
    document.getElementsByClassName('vol_form_overlay')[0].style.display = 'block';
    document.body.style.overflow = 'hidden';
});


//reporting button and reporting form opening

var report = document.getElementsByClassName('report_button')[0];
report.addEventListener('click', function () {
    window.location.href = '../report_disaster/reporting.php';
})


//requesting button and opening 

var request = document.getElementsByClassName('request_button')[0];
request.addEventListener('click', function(){
    window.location.href = '../resourcesForm/resource.php';
})


//connecting with backend

var donate = document.getElementsByClassName('donate_button')[0];
donate.addEventListener('click', async function (e) {
    e.preventDefault();

    window.location.href = '../donation/donation.php';

})



// ===============================
// ===============================
// Fetch latest alert and display
// ===============================
window.addEventListener('load', async () => {
    try {
        const response = await fetch('../php/fetch_alerts.php');
        if (!response.ok) throw new Error('Network response was not ok');
        const data = await response.json();

        // Helper to safely set numbers
        const setAlertNumber = (selector, value) => {
            const el = document.querySelector(selector);
            if (el) el.textContent = String(value);
        };

        // ✅ Check if data is valid and not empty
        if (!data || Object.keys(data).length === 0) {
            console.warn('⚠️ No alerts found from backend.');
            setAlertNumber('.yellow_alert .alert_numbers', '0');
            return;
        }

        // ✅ Extract latest alert directly (since PHP returns only one object)
        const latestAlert = data;

        // Determine district count
        const districtCount = latestAlert.district_count ?? 0;

        // Update correct alert box
        if (latestAlert.alert_type === "Red Alert") {
            setAlertNumber('.red_alert .alert_numbers', districtCount);
        } else if (latestAlert.alert_type === "Orange Alert") {
            setAlertNumber('.orange_alert .alert_numbers', districtCount);
        } else if (latestAlert.alert_type === "Yellow Alert") {
            setAlertNumber('.yellow_alert .alert_numbers', districtCount);
        } else {
            // For any custom alert like "dummy alert"
            setAlertNumber('.yellow_alert .alert_numbers', districtCount);
        }

        // ============================
        // Popup logic for latest alert
        // ============================
        const popup = document.getElementById('alert_overlay');
        const close = document.getElementById('alert_close_icon');

        document.querySelectorAll('.red_alert, .orange_alert, .yellow_alert').forEach(alertBox => {
            alertBox.addEventListener('click', () => {
                document.getElementById('alertType').textContent = latestAlert.alert_type;
                document.getElementById('alertDate').textContent = latestAlert.alert_date;
                document.getElementById('alertDistricts').textContent = latestAlert.districts;

                popup.style.display = 'block';
                document.body.style.overflow = 'hidden';
            });
        });

        close.addEventListener('click', () => {
            popup.style.display = 'none';
            document.body.style.overflow = 'auto';
        });

    } catch (error) {
        console.error('❌ Error fetching alerts:', error);
        alert('⚠️ Could not load alert details. Please try again later.');
    }
});


//signup form validation coding and saving the user data in the database for the backend

document.getElementsByClassName('signup_form')[0].addEventListener('submit', async function (e) {
    e.preventDefault();

    var name = document.getElementById('signup_name').value;
    var email = document.getElementById('signup_email').value;
    var password = document.getElementById('signup_password').value;
    var confirm_password = document.getElementById('signup_confirmpassword').value;

    if (password !== confirm_password) {
        alert('Passwords do not match');
        document.getElementById('signup_password').value = '';
        document.getElementById('signup_confirmpassword').value = '';
        return;
    }

    try {
        const response = await fetch('../php/signup.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ name, email, password }),
        });

        const data = await response.text();

        if (data === 'success') {

            alert('User registered successfully!');
            document.getElementsByClassName('login_form_overlay')[0].style.display = 'block';
            document.getElementsByClassName('login_form_box')[0].style.display = 'block';
            document.getElementsByClassName('signup_form_overlay')[0].style.display = 'none';

        } else if (data === 'exists') {
            alert('User already exists!');
        } else {
            alert('User registration failed. Please try again.');
        }
    } catch (error) {
        alert('Fetch Error: ' + error);

    }
});


//login form validation 

document.getElementsByClassName('login_form')[0].addEventListener('submit', async function (e) {

    e.preventDefault();
    var email = document.getElementById('login_email').value;
    var password = document.getElementById('login_password').value;

    try {
        const response = await fetch('../php/login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams(
                { email, password }
            )
        });

        const data = await response.text();

        if (data === 'success') {
            alert('User logged in successfully!');

            //setting the login info to local storage
            localStorage.setItem('login', 'true');
            document.getElementsByClassName('login_form_overlay')[0].style.display = 'none';
            window.location.reload();

        } else if (data === 'invalid email') {
            alert('Invalid email. Please try again.');

        } else if (data === 'invalid password') {
            alert('Invalid password. Please try again.');

        } else {
            alert('Login failed. Please try again.');
        }
    } catch (error) {
        alert('Fetch Error: ' + error);
    }

})






