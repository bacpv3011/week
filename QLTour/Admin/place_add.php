<?php
include 'header.php';
    ?>
    <div class="main-content">
        <h1>Thêm địa điểm</h1>
        <div id="content-box">
            <?php
            include 'function.php';
            if (isset($_GET['action']) && $_GET['action'] == 'add') {
                if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['content'])) {
                    if (empty($_POST['name'])) {
                        $error = "Chưa nhập tên địa điểm";
                    } elseif (empty($_POST['address'])) {
                        $error = "Chưa nhập địa điểm";
                    }elseif (empty($_POST['content'])) {
                        $error = "Miêu tả gì đó đi";
                    }
                    if (isset($_FILES['fileupload']) && !empty($_FILES['fileupload']['name'])) {
                        $uploadedFiles = $_FILES['fileupload'];
                        uploadFiles($uploadedFiles);
                    }else {
                        $error = "Chưa có ảnh chi tiết";
                    }
                    
                    if(!isset($error)){
                        $name = $_POST['name'];
                        $address = $_POST['address'];
                        $file = "../data/img/" . basename($_FILES["fileupload"]["name"]);
                        $content = $_POST['content'];
                        if(!checkPlaceIsExisted($name)){
                            addPlaceToFile($name,$address,$file,$content);
                        }else{
                            $error = "Địa điểm đã tồn tại";
                        }
                    }
                } else {
                    $error = "Chưa nhập thông tin.";
            }
            ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Thêm thành công" ?></div>
                    <a href = "place_list.php">Quay lại danh sách địa điểm</a>
                </div>
            <?php } else { ?>
                <form id="place-form" method="POST" action="?action=add"  enctype="multipart/form-data">
                    <input type="submit" title="Save" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên địa điểm: </label>
                        <input type="text" name="name" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Địa chỉ: </label>
                        <input type="text" name="address" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ảnh chi tiết: </label>
                        <div class="right-wrap-field">
                            <input type="file" name="fileupload" id="fileupload" />
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Miêu tả: </label>
                        <textarea name="content" id="content"></textarea>
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