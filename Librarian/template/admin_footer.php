<!DOCTYPE html>
<html>
<head>
    <title>Footer Example</title>
    <style>
        /* ======== common ======== */
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        /* ========= Header =========== */
        .header {
            min-height: 10vh;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.8);
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
            padding: 8px 20px;
            position: relative;
        }

        .nav-links ul li a {
            color: white;
            text-decoration: none;
            font-size: 14px;
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

        @media(max-width: 700px) {
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
<td>
<footer class="footer">
    <h4 class="footer_title">Welcome, Library  <?php echo "<h1> Welcome ".$rows['name']."</h2>";?></h4>
    <p class="head_foot_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non officiis quis nobis
        obcaecati amet sed unde delectus saepe modi ipsam!</p>
    <div class="icons">
        <i class="ri-facebook-fill" id="icon_footer"></i>
        <i class="ri-twitter-x-fill" id="icon_footer"></i>
        <i class="ri-instagram-fill" id="icon_footer"></i>
        <i class="ri-linkedin-fill" id="icon_footer"></i>
        <i class="ri-youtube-fill" id="icon_footer"></i>
    </div>
</footer>
    </td>


</body>
</html>
