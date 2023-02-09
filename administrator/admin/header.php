<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <title>Bài 12: Hướng dẫn tạo trang quản trị (admin): quản lý sản phẩm - Phần 1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <link rel="stylesheet" href="../../fonts/fontawesome-free-6.2.1-web/css/all.min.css">
    <script src="../resources/ckeditor/ckeditor.js"></script>
</head>

<body>
    <?php
    session_start();
    include '../../sql/connect_db.php';
    include '../function.php';
    if (!empty($_SESSION['current_user'])) { //Kiểm tra xem đã đăng nhập chưa?
    ?>
        <div id="admin-heading-panel">
            <div class="container">
                <div class="left-panel">
                    Xin chào <span>Admin</span>
                </div>
                <div class="right-panel">
                    <a href="../../index.html">
                        <i class="fa-solid fa-house"></i>
                        Trang chủ
                    </a>

                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Đăng xuất
                    </a>
                </div>
            </div>
        </div>
        <div id="content-wrapper">
            <div class="container">
                <div class="left-menu">
                    <div class="menu-heading">Admin Menu</div>
                    <div class="menu-items">
                        <ul>
                            <li><a href="#">Cấu hình</a></li>
                            <li><a href="#">Tin tức</a></li>
                            <li><a href="product_listing.php">Sản phẩm</a></li>
                            <li><a href="#">Đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>