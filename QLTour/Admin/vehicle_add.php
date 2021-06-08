<?php
include 'header.php';
?>
    <div class="main-content">
        <h1>Thêm phương tiện</h1>
        <div id="content-box">
            <?php
            include 'function.php';
            if (isset($_GET['action']) && $_GET['action'] == 'add') {
                if (isset($_POST['name']) && isset($_POST['type']) &&isset($_POST['num'])&&isset($_POST['price']) && 
                    isset($_POST['brand'])&&isset($_POST['date'])&&isset($_POST['status'])) {
                    if (empty($_POST['name'])) {
                        $error = "Chưa nhập tên phương tiện";
                    } elseif (empty($_POST['type'])) {
                        $error = "Chưa nhập loại phương tiện";
                    }elseif (empty($_POST['date'])) {
                        $error = "Chưa nhập ngày sản xuất";
                    }elseif (empty($_POST['brand'])) {
                        $error = "Chưa nhập thương hiệu";
                    }elseif (empty($_POST['status'])) {
                        $error = "Chưa nhập tình trạng phương tiện";
                    }elseif (!empty($_POST['price']) && is_numeric(str_replace('.', '', $_POST['price'])) == false) {
                        $error = "Nhập lại giá đi";
                    }elseif (!empty($_POST['num']) && is_numeric(str_replace('.', '', $_POST['num'])) == false) {
                        $error = "Nhập lại số chỗ đi";
                    }
                    
                    if(!isset($error)){
                        $name = $_POST['name'];
                        $type = $_POST['type'];
                        $num = $_POST['num'];
                        $price = $_POST['price'];
                        $brand = $_POST['brand'];
                        $date = $_POST['date'];
                        $status = $_POST['status'];
                        
                        addVehicleToFile($name,$type,$num,$price,$brand,$date,$status);
                    }
                } else {
                    $error = "Chưa nhập thông tin.";
            }
            ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Thêm thành công" ?></div>
                    <a href = "vehicle_list.php">Quay lại danh sách phương tiện</a>
                </div>
            <?php } else { ?>
                <form id="place-form" method="POST" action="?action=add"  enctype="multipart/form-data">
                    <input type="submit" title="Save" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên phương tiện: </label>
                        <input type="text" name="name" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Loại phương tiện: </label>
                        <input type="text" name="type" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Số lượng chỗ: </label>
                        <input type="text" name="num" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá: </label>
                        <input type="text" name="price" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Thương hiệu: </label>
                        <input type="text" name="brand" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ngày sản xuất: </label>
                        <input type="date" name="date" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Tình trạng xe: </label>
                        <input type="text" name="status" value="" />
                        <div class="clear-both"></div>
                    </div>
                </form>
                <div class="clear-both"></div>
                <script>
                </script>
            <?php } ?>
        </div>
    </div>

    <?php
include './footer.php';
?>