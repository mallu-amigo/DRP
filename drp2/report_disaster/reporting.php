<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reporting.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    


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


        <!-- coding the disaster reporting box and form -->

        <div class="reporting_box">
            <div class="reporting_header">
                <h2>Report a Disaster</h2>
            </div>
            <hr>


            <form class="reporting_form">
                <label for="Title" class="l" id="l_title">Title</label>
                <input type="text" id="title" name="title" class="i" required>
                <label for="description" class="l" id="l_description">Description</label>
                <textarea id="description" name="description" class="i"></textarea>
                <label for="location" class="l" id="l_location">Location</label>
                <input type="text" id="location" name="location" class="i" required>
                <button id="location_btn" class="c_location">Select Current Location</button><br>

                <label for="datetime" class="l" id="l_datetime">Date and Time</label>
                <input type="datetime-local" id="datetime" name="datetime" class="i">
                <label for="urgency" class="l" id="l_urgency">Urgency Level</label>


                <select id="urgency" name="urgency" class="i">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>



                <!-- media upload -->

                <label for="media" class="l" id="l_media">Upload Media</label>
                <input type="file" id="media" name="file" class="i">

                <label for="username" class="l" id="l_username">User's Name</label>
                <input type="text" id="username" name="username" class="i" required>

                <label for="contact" class="l" id="l_contact">Email or Phone Number</label>
                <input type="text" id="contact" name="contact" class="i" required>

                <button id="submit_btn" class="c_submit">Submit</button>

            </form>
        </div>



        <!-- coding footer  -->

        <div id="footer">
            <div class="footer_box">
                <div class="aboutus">
                    <h2>About Us</h2> <br>
                    <span id="aboutus_text">We are dedicated to providing immediate assistance and support during
                        disasters,
                        connecting
                        communities, and facilitating relief efforts across the region.</span>
                </div>
                <div class="contact_info">
                    <h2>Contact Us</h2> <br>
                    <ol>
                        <li id="contact_us">Emergency : 123-456-789</li>
                        <li id="contact_us">Email: 4oB3t@example.com</li>
                        <li id="contact_us">24/7 Support: 987-654-321</li>
                    </ol>
                </div>
                <div class="followus">
                    <h2>Follow Us</h2>
                    <i class="fa-brands fa-square-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </div class="footer_box">>
            <hr id="footer_hr">

            <div class="footer_bottom">
                <span id="footer_bottom_text">© 2025 Disaster Relief. All rights reserved.</span>
            </div>
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
    </div>




    <script src="currentLocation.js"></script>

    <script src="reporting.js"></script>
    <script src="reportform.js"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


</body>