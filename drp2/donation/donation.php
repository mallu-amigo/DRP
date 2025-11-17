<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="donation.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


</head>

<body>

    <div class="container">

        <!-- coding header -->

        <div id="header">
            <div class="menu_icon">
                <i class="fa fa-bars" id="menu_icon" aria-hidden="true"></i>
                <h2 id="project_name">Disaster Relief</h5>
            </div>


        </div>


        <!-- coding menu icon side bar -->

        <div class="overlay">

            <div class="side_bar animate__animated animate__slideInLeft animate__faster">
                <div class="side_bar_header">
                    <h2>Menu</h2>
                    <i class="fa-solid fa-xmark" id="close_icon"></i>
                </div>

                <div class="menu_list">
                    <ul id="menu_list">
                        <li id="menu_items" class="home">Home</li>
                        <li id="menu_items" class="report_disaster">Report Disaster</li>
                        <li id="menu_items" class="donate">Donate</li>
                        <li id="menu_items" class="volunteer">Volunteer</li>
                        <li id="menu_items" class="contact">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>



        <!-- coding the donation form box -->

        <div class="form_box">
            <div class="form_header">
                <h2>Donation Form</h2>
            </div> <hr>

            <form class="form">
                <label for="Name" id="l">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>

                <label for="Email" id="l">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="phone" id="l">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

                <label for="amount" id="l">Amount</label>
                <input type="number" id="amount" name="amount" placeholder="Enter the amount" required>

                <button type="submit" id="submit">Donate</button>
            </form>
        </div>


    </div>


    <script src="donation.js"></script>
    <script src="https://sdk.cashfree.com/js/ui/1.0.0/cashfree.js"></script>
</body>



