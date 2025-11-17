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
    window.location.href = '../home/home.php#footer';
    side_bar.style.display = 'none';
    document.body.style.overflow = 'auto';
});

//home

var home = document.getElementsByClassName('home')[0];
home.addEventListener('click', function () {
    window.location.href = '../home/home.php#hero';
    var side_bar = document.getElementsByClassName('overlay')[0];
    side_bar.style.display = 'none';
})

//donate

var home = document.getElementsByClassName('donate')[0];
home.addEventListener('click', function () {
    side_bar.style.display = 'none';
    document.body.style.overflow = 'auto';
    
})


//repoting disaster

var report = document.getElementsByClassName('report_disaster')[0];
report.addEventListener('click', function () {
    window.location.href = '../report_disaster/reporting.php';
    var side_bar = document.getElementsByClassName('overlay')[0];
    side_bar.style.display = 'none';
})


// Connect to backend and initiate payment
document.getElementById("submit").addEventListener("click", async function() {
    // Get form values
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const amount = document.getElementById("amount").value.trim();

    // Basic validation
    if (!name || !email || !phone || !amount) {
        alert("⚠️ Please fill all fields before proceeding.");
        return;
    }

    try {
        // Send data to backend to create order
        const response = await fetch("../php/gateway.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ name, email, phone, amount })
        });

        const data = await response.json();

        if (!data.payment_session_id) {
            alert("❌ Failed to create payment session. Please try again.");
            console.error("Cashfree response:", data);
            return;
        }

        // Open Cashfree Checkout using SDK
        const checkoutOptions = {
            sessionId: data.payment_session_id,
            mode: "payment", // opens payment modal
            customerDetails: {
                customerName: name,
                customerEmail: email,
                customerPhone: phone
            }
        };

        // Initiate the Cashfree Checkout popup
        CashfreeSDK.initiatePayment(checkoutOptions);

    } catch (error) {
        console.error("Error initiating payment:", error);
        alert("❌ Something went wrong. Please try again.");
    }
});

