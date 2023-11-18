<?php
session_start();
?>
<?php
include('libs/helper.php');
if (!$_SESSION['email']) {
    Helper::redirect(Helper::get_url('../Web_QLTV/PHP/log_in.php'));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/header_footer.css">
    <title>Team 2 - User</title>
</head>

<body>
    <!-- header -->
    <div class="header">
        <img src="../Image/logo.png" alt="logo_team">
        <div>
            <h2>Open Library</h2>
            <h3>Development Team - Team 2</h3>
        </div>
    </div>
    <!-- Body -->
    <div class="body">
        <!-- sidebar -->
        <div class="sidebar">
            <div>
                <ul>
                    <div class="menu">
                        <li><a href="../HTML/home.html" class="showContentLink">Home</a></li>
                    </div>
                    <div class="menu">
                        <li><a href="../PHP/users/search.php" class="showContentLink"> Book Registration</a></li>
                    </div>
                    <div class="menu">
                        <li><a href="../PHP/users/read_book.php" class="showContentLink">Read Book</a></li>
                    </div>
                    <div class="menu">
                        <li><a href="../PHP/users/update_info.php" class="showContentLink">Update Information</a></li>
                    </div>
                    <div class="menu">
                        <li class="log_out"><a href="./log_out.php">Log Out</a></li>
                    </div>
                </ul>
            </div>
        </div>
        <!-- content -->
        <div class="content">
            <iframe id="contentFrame" src="../HTML/home.html" width="100%" height="100%" style="border:none;"></iframe>

            <script>
                var contentFrame = document.getElementById("contentFrame");
                var showLinks = document.querySelectorAll(".showContentLink");

                showLinks.forEach(function(link) {
                    link.addEventListener("click", function(event) {
                        event.preventDefault();
                        contentFrame.src = this.href;
                    });
                });
            </script>
        </div>
    </div>
    <!--Footer-->
    <div class="footer">
        <ul>
            <li>
                <p><i class="fa-solid fa-location-dot"></i> Address: 136 Phạm Như Xương, Hòa Khánh Nam, quận
                    Liên Chiểu, TP.Đà Nẵng</p>
            </li>
            <li>
                <p><i class="fa-solid fa-phone"></i> A Phone Number: 0867548549 - 0702032064</p>
            </li>
            <li>
                <p><i class="fa-solid fa-envelope"></i> Email: viet.gm.2k3@gmail.com</p>
            </li>
            <div class="license">
                <li>
                    <p>&#169 Bản quyền thuộc Hệ Thống Quản Lý Thư Viện - Team 2</p>
                </li>
            </div>

    </div>
</body>

</html>