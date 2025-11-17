<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">

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

            <div class="login_icon">
                <i class="fa-regular fa-user" id="user_icon"></i>
                <h2 id="login_signup"> Login / Sign Up</h2>
            </div>
            <div class="logout_icon">
                <i class="fa-regular fa-user" id="user_icon"></i>
                <h2 id="logout">Logout</h2>
            </div>
        </div>

        <!-- coding for Hero -->
        <div id="hero">
            <div id="hero_box">
                <h1 id="slogan">Be a Helping Hand During <br> Disasters</h1>
                <h2 id="slogan2">Together we can make a difference. Join our network of volunteers and supporters to
                    <br>help communities recover from disasters.
                </h2>
                
                <div class="report_button">
                    <i class="fa-solid fa-triangle-exclamation"></i>Report Disaster
                </div>
                <div class="donate_button">
                    <i class="fa-regular fa-heart"></i>Donate
                </div>
                <div class="request_button">
                    <i class="fa-regular fa-handshake"></i>Need Help?
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
                        <li id="menu_items" class="adminpage">Login in as Admin</li>
                    </ul>
                </div>
            </div>
        </div>


        <!-- coding for the login form -->


        <div class="login_form_overlay">
            <div class="login_form_box">
                <div class="login_form_header">
                    <h2>Login</h2>
                    <i class="fa-solid fa-xmark" id="login_close_icon"></i>
                </div> <br>

                <hr>
                <form class="login_form">
                    <label for="email" id="login_label_email">Email</label>
                    <input type="email" name="email" id="login_email" required>
                    <label for="password" id="login_label_password">Password</label>
                    <input type="password" name="password" id="login_password" required>
                    <input type="submit" value="Login" id="login_button">
                    <center><span id="login_link">Don't have an account? Sign Up</span></center>
                </form>
            </div>
        </div>

        <!-- coding for the signup form -->

        <div class="signup_form_overlay">
            <div class="signup_form_box">
                <div class="signup_form_header">
                    <h2>Sign Up</h2>
                    <i class="fa-solid fa-xmark" id="signup_close_icon"></i>
                </div> <br>
                <hr>

                <form class="signup_form">
                    <label for="name" id="signup_label_name">Full Name</label>
                    <input type="text" name="name" id="signup_name" required>
                    <label for="email" id="signup_label_email">Email</label>
                    <input type="email" name="email" id="signup_email" required>
                    <label for="password" id="signup_label_password">Password</label>
                    <input type="password" name="password" id="signup_password" required>
                    <label for="confirmpassword" id="signup_label_confirmpassword">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="signup_confirmpassword" required>
                    <input type="submit" value="Sign Up" id="signup_button">
                    <center><span id="signup_link">Already have an account? Login</span></center>
                </form>
            </div>
        </div>


        <!-- Recently Reported Disasters Section -->
        <div class="disasters_box">
            <div class="disasters_header">
                <h2>Recently Reported Disasters</h2>
                <hr>
            </div>
            <div id="reports_box" class="reports_box">
                <div class="card">
                    <div class="image">
                        <img src="" alt="disaster image" id="disaster_image_1">
                    </div>
                    <div class="informations">
                        <h2 id="disaster_name_1">Title</h2>
                        <span id="disaster_location_1"><i class="fa fa-location-dot"></i> Location</span>
                        <span id="disaster_date_1"><i class="fa fa-calendar"></i> Date</span>
                        <button class="view_report" data-id="1">View Details</button>
                    </div>
                </div>

                <!-- Second Report -->
                <div class="card">
                    <div class="image">
                        <img src="" alt="disaster image" id="disaster_image_2">
                    </div>
                    <div class="informations">
                        <h2 id="disaster_name_2">Title</h2>
                        <span id="disaster_location_2"><i class="fa fa-location-dot"></i> Location</span>
                        <span id="disaster_date_2"><i class="fa fa-calendar"></i> Date</span>
                        <button class="view_report" data-id="2">View Details</button>
                    </div>
                </div>

                <!-- View All Reports Button -->
                <a href="../reports/reports.html" id="view_all_reports">
                    View All Reports <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>



        <!-- coding of the current alerts -->

        <div class="alert_section">
            <div id="alert_title">
                <h2>Current Alerts</h2>

                <hr>
                <div class="alert_boxes">
                    <div class="red_alert">
                        <h2 class="alert_type">Red Alerts</h2>
                        <hr>
                        <h1 class="alert_numbers">0</h1>
                    </div>
                    <div class="orange_alert">
                        <h2 class="alert_type">Orange Alerts</h2>
                        <hr>
                        <h1 class="alert_numbers">0</h1>
                    </div>
                    <div class="yellow_alert">
                        <h2 class="alert_type">Yellow Alerts</h2>
                        <hr>
                        <h1 class="alert_numbers">0</h1>
                    </div>
                </div>
            </div>

        </div>


        <!-- coding of the resource needs -->

        <div class="resource_section">
            <div class="resource_title">
                <h2>Critical Resource Needs</h2>
                <hr>
            </div>
            <div class="resources_box">
                <div class="resource1">
                    <div class="resource_name"><i class="fa fa-cube" aria-hidden="true"></i>
                    </div>
                    <div class="resource_description"></div>
                    <div class="resource_location"><i class="fa fa-location-dot" aria-hidden="true"></i> </div>
                    <input type="submit" value="View Details" id="view_resource_details" data-id="1">
                </div>
                <div class="resource2">
                    <div class="resource_name2"><i class="fa fa-cube" aria-hidden="true"></i> 
                    </div>
                    <div class="resource_description2"></div>
                    <div class="resource_location2"><i class="fa fa-location-dot" aria-hidden="true"></i> </div>
                    <input type="submit" value="View Details" id="view_resource_details" data-id="2">
                </div>
                
                <a href="../requests/request.html" id="view_all_resource_request">View All Resource Requests <i
                        class="fa fa-arrow-right" aria-hidden="true"></i></a>

            </div>

        </div>
        <!-- coding of the Volunteer section -->

        <div id="volunteer_section">
            <div class="volunteer_box">
                <div class="volunteer_circle">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <h2>Join Our Volunteer Network</h2>
                <span>Make a difference in your community by joining our network of dedicated volunteers. Whether you
                    have
                    medical expertise, can help with logistics, or simply want to contribute your time, we need your
                    support.</span>

                <input type="submit" value="Join Now" id="volunteer_button">
            </div>
        </div>


        <!-- coding of the footer section -->

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


        <!-- coding of the volunteer form -->

        <div class="vol_form_overlay">
            <div class="vol_form_section">
                <div class="volunteer_header">
                    <h2>Register</h2>
                    <i class="fa-solid fa-xmark" id="vol_close_icon"></i>
                </div>
                <hr>


                <form id="volunteer_form">
                    <label for="fullname" id="label_fullname" class="label">Full Name</label>
                    <input type="text" name="fullname" id="vol_fullname" class="vol" required>
                    <label for="agge" id="label_age" class="label">Age</label>
                    <input type="tel" name="age" id="vol_age" class="vol" required>
                    <select name="gender" id="vol_gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>

                    <label for="email" id="label_email" class="label">Email</label>
                    <input type="email" name="email" id="vol_email" class="vol" required>
                    <label for="phonenumber" id="label_phonenumber" class="label">Phone Number</label>
                    <input type="tel" name="phone" id="vol_phonenumber" class="vol" required>

                    <select name="district" id="vol_district" required>
                        <option value="" disabled selected>Select District</option>
                        <option value="Alappuzha">Alappuzha</option>
                        <option value="Ernakulam">Ernakulam</option>
                        <option value="Idukki">Idukki</option>
                        <option value="Kannur">Kannur</option>
                        <option value="Kasaragod">Kasaragod</option>
                        <option value="Kollam">Kollam</option>
                        <option value="Kottayam">Kottayam</option>
                        <option value="Kozhikode">Kozhikode</option>
                        <option value="Malappuram">Malappuram</option>
                        <option value="Palakkad">Palakkad</option>
                        <option value="Pathanamthitta">Pathanamthitta</option>
                        <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                        <option value="Thrissur">Thrissur</option>
                        <option value="Wayanad">Wayanad</option>
                    </select>
                    <input type="submit" value="Register" id="vol_register_button">
                </form>
            </div>
        </div>
    </div>
    <!-- coding the alerts section popup -->

    <div id="alert_overlay">
        <div class="alertpp">
            <div class="alert_header">
                <h2 id="alertType">Red alerts</h2>
                <i class="fa-solid fa-xmark" id="alert_close_icon"></i>
            </div>
            <hr id="alert_hr">

            <div class="alertDetails">
                Date: <span id="alertDate">22/07/2003</span> <br><br>
                Districts: <span id="alertDistricts">Kattakada</span> <br>
            </div>
        </div>
    </div>
    </div>


    <!-- coding the disaster view details popup -->

    <div id="view_details_overlay">
        <div class="view_details_popup">
            <div class="popupHeader">
                <h2>Disaster Details</h2>
                <i class="fa-solid fa-xmark" id="view_details_close_icon"></i>
            </div>
            <hr>

            <div class="detailsBox">
                <div class="disImg">
                    <img src="" alt="" id="imagViewDetails">
                </div>
                <div class="disasterDetails">
                    <span id="disasterTitle"></span>
                    <span id="urgencyLevel"></span>
                    <span id="disasterLocation"></span>
                    <span id="disasterDate"></span>


                </div>
                <div class="userDetails">
                    <span id="disasterDescription"></span>
                    <div class="reporterDetails">
                        <p>Reported by:</p>
                        <div class="reporterInfo">
                            <i class="fa fa-user"></i> <span id="reporterName"></span>
                        </div>
                        <div class="reporterInfo">
                            <i class="fa fa-phone"></i> <span id="reporterEmailorPhone"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- coding the resource details popup -->

    <div id="view_details_overlay">
        <div class="view_details_popup">
            <div class="popupHeader">
                <h2>Disaster Details</h2>
                <i class="fa-solid fa-xmark" id="view_details_close_icon"></i>
            </div>
            <hr>

            <div class="detailsBox">
                <div class="disImg">
                    <img src="" alt="" id="imagViewDetails">
                </div>
                <div class="disasterDetails">
                    <span id="disasterTitle"></span>
                    <span id="urgencyLevel"></span>
                    <span id="disasterLocation"></span>
                    <span id="disasterDate"></span>


                </div>
                <div class="userDetails">
                    <span id="disasterDescription"></span>
                    <div class="reporterDetails">
                        <p>Reported by:</p>
                        <div class="reporterInfo">
                            <i class="fa fa-user"></i> <span id="reporterName"></span>
                        </div>
                        <div class="reporterInfo">
                            <i class="fa fa-phone"></i> <span id="reporterEmailorPhone"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>








    <script src="reportform.js"></script>
    <script src="home.js"></script>
    <script src="recentReports.js"></script>
    <script src="recentRequest.js"></script>
    <script src="volunteers.js"></script>

</body>

</html>