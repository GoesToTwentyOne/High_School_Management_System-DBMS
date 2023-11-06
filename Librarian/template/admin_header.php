<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Header Example</title>
    <style>
        /* ======== common ======== */

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        .head_foot_description {
            margin: 10px 0 40px;
            font-size: 14px;
            color: #777;
            font-weight: 300;
            line-height: 22px;
            padding: 0px 150px 0px 150px;
        }

        .header_box_btn {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            border: 1px solid #fff;
            padding: 12px 34px;
            font-size: 13px;
            background: transparent;
            position: relative;
            cursor: pointer;
        }

        .header_box_btn:hover {
            border: 1px solid #ffffff;
            background: #2692ff;
            color: rgb(255, 255, 255);
            transition: 1s;
        }

        /* ========= Header =========== */

        .header {
            min-height: 7vh;
            width: 100%;
            background-image: linear-gradient(rgba(8, 4, 30, 0.7), rgba(2, 5, 17, 0.7)), url(../Images/banner_1.png);
            background-size: cover;
            background-position: center;
            position: relative;
        }

        nav {
            display: flex;
            padding: 2% 6%;
            justify-content: space-between;
            align-items: center;
        }

        nav img {
            width: 200px;
        }

        .nav-links {
            flex: 1;
            text-align: right;
        }

        .nav-links ul li {
            list-style: none;
            display: inline-block;
            padding: 8px 12px;
            position: relative;
        }

        .nav-links ul li a {
            color: white;
            text-decoration: none;
            font-size: 13px;
        }

        .nav-links ul li::after {
            content: '';
            width: 0%;
            height: 2px;
            background: #ffffff;
            display: block;
            margin: auto;
            transition: 0.5s;
        }

        .nav-links ul li:hover::after {
            width: 100%;
        }

        .text-box {
            width: 90%;
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .text-box h1 {
            font-size: 62px;
        }

        .text-box p {
            color: #fff;
        }


        nav .ri-close-circle-fill,
        .ri-menu-line {
            display: none;
        }

        /* ---------- footer ---------  */
        .footer {
            background: #eeeeee;
            width: 100%;
            text-align: center;
            padding: 30px 0;
        }

        .footer_title {
            font-size: 36px;
            font-weight: 600;
        }

        .footer h4 {
            font-size: 20px;
            margin-bottom: 25px;
            margin-top: 20px;
        }

        #icon_footer {
            color: #1b1b1b;
            margin: 0 13px;
            cursor: pointer;
            padding: 18px 0;
        }

        @media (max-width: 700px) {
            .text-box h1 {
                font-size: 36px;
            }

            .head_foot_description {
                margin: 10px 0 40px;
                padding: 0px 40px 0px 40px;
            }

            .nav-links ul li {
                display: block;
            }

            .nav-links {
                position: absolute;
                background: rgba(0, 0, 0, 0.7);
                height: 100vh;
                width: 170px;
                top: 0;
                right: -170px;
                text-align: left;
                z-index: 2;
                transition: 1s;
            }

            nav .ri-close-circle-fill {
                display: block;
                color: #fff;
                margin: 10px;
                font-size: 22px;
                cursor: pointer;
                transition: 1s;
            }

            nav .ri-menu-line {
                display: block;
                color: #fff;
                margin: 10px;
                font-size: 22px;
                cursor: pointer;
                transition: 1s;
            }

            .nav-links ul {
                padding: 30px;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <nav>
        <a href="../../Home/Index.php"><img height="55" src="image/icon.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="ri-close-circle-fill" id="close"></i>
                <ul>
                    <li><a href="../Controller/Logout.php">Sign out</a></li>
                    
                </ul>
            </div>
            <i class="ri-menu-line" id="menu"></i>
        </nav>
    </header>

    <script>
        var navLinks = document.getElementById("navLinks");
        var close = document.getElementById("close");
        var menu = document.getElementById("menu");

        function showMenu() {
            navLinks.style.right = "0";
            menu.style.color = "transparent";
        }

        function hideMenu() {
            navLinks.style.right = "-170px";
            menu.style.color = "#fff";
        }

        menu.addEventListener('click', showMenu);
        close.addEventListener('click', hideMenu);
    </script>

</body>

</html>
