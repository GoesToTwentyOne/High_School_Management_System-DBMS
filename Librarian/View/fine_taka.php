<?php
session_start();

if (isset($_SESSION['userid'])) {
    include '../template/admin_header.php';
    include "LoginHeader.php";
    include "Sidebar.php";
} else {
    echo '<script>alert("Login First!")</script>';
    echo '<script>location.href="Login.php"</script>';
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Find Books</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <h1>SEARCH Balance</h1><hr>

    <label style="font-size: 20px">Search:<?php echo '&emsp;'; ?></label>
    <input type="text" name="search_text" id="search_text" placeholder="Search by User id"><hr>
    <div id="result"></div>
</body>
</html>

<script>
$(document).ready(function () {
    load_data(); // This line calls the load_data function without any argument when the document is ready.
    // This is used to load some initial data onto the page.

    function load_data(query) {
        $.ajax({
            url: "../Model/fetch2.php",
            method: "POST",
            data: {
                query: query
            },
            success: function (data) {
                $('#result').html(data);
            }
        });
    }

    $('#search_text').keyup(function () {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        } else {
            load_data();
        }
    });
});
</script>
</table>
</br></br></br>
 <table>
<footer class="footer">
    <h4 class="footer_title"><h4>Welcome, Library...  </h4>
    <p class="head_foot_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non officiis quis nobis
        obcaecati amet sed unde delectus saepe modi ipsam!</p>
</footer>
</table>
