<?php
include 'header.php';
    ?>
    <div class="main-content">
        <h1>Xóa địa điểm</h1>
        <div id="content-box">
        <?php
            include 'function.php';
            deletePlace($_GET['id']);
            ?>
            <div id="success-notify" class="box-content">
                <h2>Xóa địa điểm thành công</h2>
                <a href="./place_list.php">Danh sách địa điểm</a>
            </div>
        </div>
    </div>
    <?php
include 'footer.php';
?>