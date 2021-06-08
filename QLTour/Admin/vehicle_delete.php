<?php
include 'header.php';
?>
    <div class="main-content">
        <h1>Xóa khách sạn</h1>
        <div id="content-box">
        <?php
            include 'function.php';
            deleteVehicle($_GET['id']);
            ?>
            <div id="success-notify" class="box-content">
                <h2>Xóa phương tiện thành công thành công</h2>
                <a href="./vehicle_list.php">Danh sách địa điểm</a>
            </div>
        </div>
    </div>
    <?php
include 'footer.php';
?>