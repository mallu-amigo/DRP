<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* coding the header */

        #header {
            width: 100%;
            height: 65px;
            background-color: white;
            padding: 10px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0px 2px 5px 1px #ccc;
        }

        #menu_icon {
            color: #B91C1C;
            margin-right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        #project_name {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 20px;
        }

        .menu_icon {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            float: left;
        }

        .login_icon,
        .logout_icon {
            float: right;
            border: #B91C1C solid 1px;
            border-radius: 10px;
            height: 40px;
            width: 180px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin-right: 10px;
            padding-top: 3px;
        }

        .logout_icon {
            float: right;
            border: #B91C1C solid 1px;
            border-radius: 10px;
            height: 40px;
            width: 180px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin-right: 10px;
            padding-top: 3px;
            position: absolute;
            top: 10px;
            right: 10px;
            display: none;
        }

        .login_icon:hover,
        .logout_icon:hover {
            background-color: #ffefef;
            color: white;
            transition: .2s;
        }



        #user_icon {
            color: #B91C1C;
            font-size: 15px;
            margin-right: 5px;
        }

        .login_icon h2,
        .logout_icon h2 {
            color: #B91C1C;
            text-align: center;
            font-size: 17px;
            font-family: sans-serif;
            font-weight: 100;
        }

        #buttons {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #report,
        #request {
            margin: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #DC2626;
            color: white;
            font-size: 20px;
            cursor: pointer;
            width: 150px;
            margin-left: 30px;
        }

        #report:hover, #request:hover{
            background-color: #B91C1C;
            transition: .2s;
        }
    </style>

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
                <h2 id="login_signup"> Logout</h2>
            </div>
            
        </div>


        <div id="buttons">
            <button id="report">Reports</button>
            <button id="request">Requests</button>
        </div>

    </div>


    <script>
        document.getElementById('report').addEventListener('click', function (){
            window.location.href = 'report.php';
        })

        document.getElementById('request').addEventListener('click', function (){
            window.location.href = 'request.php';
        })

        document.getElementsByClassName('login_icon')[0].addEventListener('click', function(){
            window.location.href = '../home/home.php';
        })
    </script>
</body>