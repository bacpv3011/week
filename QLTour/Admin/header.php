<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Quản lý tour - Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/admin_style.css" >
        <script src="../js/script.js"></script>
    </head>
    <body>
            <div id="admin-heading-panel">
                <div class="container">
                    <div class="left-panel">
                        <span>Admin</span>
                    </div>
                    <div class="right-panel">
                        <img height="24" src="../images/home.png" />
                        <a href="../admin/header.php">Trang chủ</a>
                    </div>
                </div>
            </div>
            <div id="content-wrapper">
                <div class="container">
                    <div class="left-menu">
                        <div class="menu-heading">Admin Menu</div>
                        <div class="menu-items">
                            <ul>
                                <li><a onclick="oneClick()">-Quản lý tour du lịch</a>
                                  <div id="one" style="display:none">
                                    <a href="./place_list.php" >+Quản lý địa điểm</a><br>
                                    <a onclick="oneoneClick()" >+Quản lý dịch vụ</a><br>
                                    <div id="oneone" style="display:none">
                                         <a href="./hotel_list.php" >+Dịch vụ khách sạn</a><br>
                                         <a href="./vehicle_list.php" >+Dịch vụ phương tiện</a><br>
                                         <a href="#" >+Dịch vụ khác</a><br>
                                    </div>
                                    <a href="./tour_list.php" >+Quản lý tour</a>
                                  </div>
                                </li>
                                <li><a href="#">-Quản lý tài khoản</a>
                                    <a id="two" href="#" style="display:none">+Phân quyền tài khoản</a>
                                </li>
                                <li><a href="#">-Xem thống kê, báo cáo</a></li>
                            </ul>
                        </div> 
            </div>