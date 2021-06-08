<?php
include 'header.php';
?>
    <div class="main-content">
        <h1>Thêm tour mới</h1>
        <div id="content-box">
            <?php
            include 'function.php';
            if (isset($_GET['action']) && $_GET['action'] == 'add') {
                if (empty($_POST['name'])) {
                    $error = "Chưa nhập tên tour";
                } elseif (empty($_POST['address'])) {
                    $error = "Chưa nhập nơi khởi hành";
                }elseif (empty($_POST['start'])) {
                    $error = "Chưa nhập ngày khởi hành";
                }elseif (empty($_POST['end'])) {
                    $error = "Chưa nhập ngày kết thúc";
                }elseif (empty($_POST['price'])) {
                    $error = "Chưa nhập giá tour";
                }elseif (empty($_POST['timetable'])) {
                    $error = "Chưa nhập lịch trình tour";
                }elseif (empty($_POST['numbers'])) {
                    $error = "Chưa nhập số lượng chỗ";
                }
                
                $place = array();
                $service = array();
                for($i = 0; $i < 20; $i++){
                    if(isset($_POST['place'.$i]) && $_POST['place'.$i] != ""){
                        if(empty($_POST['place'.$i])){
                            $error = "Chưa nhập địa điểm".$i;
                        }else{
                            $place[] =  $_POST['place'.$i];
                        }
                    }
                    if(isset($_POST['service'.$i]) && $_POST['service'.$i] != ""){
                        if(empty($_POST['service'.$i])){
                            $error = "Chưa nhập dịch vụ".$i;
                        }else{
                            $service[] =  $_POST['service'.$i];
                        }
                    }
                }
                
                if (isset($_FILES['fileupload']) && !empty($_FILES['fileupload']['name'])) {
                    $uploadedFiles = $_FILES['fileupload'];
                    uploadFiles($uploadedFiles);
                }else {
                    $error = "Chưa có ảnh minh họa";
                }
                
                
                
                
                if(!isset($error)){
                    $name = $_POST['name'];
                    $file = "../data/img/" . basename($_FILES["fileupload"]["name"]);
                    $address = $_POST['address'];
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $numbers = $_POST['numbers'];
                    $price = $_POST['price'];
                    $timetable = $_POST['timetable'];
                    $status = $_POST['status'];
                    addTour($name,$file,$address,$start,$end,$price,$status,$numbers,$timetable,$place,$service);
                }
            ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Thêm thành công" ?></div>
                    <a href = "tour_list.php">Quay lại danh sách địa điểm</a>
                </div>
            <?php } else { ?>
                <form id="place-form" method="POST" action="?action=add" onsubmit="return validateForm()" enctype="multipart/form-data">
                    <input type="submit" title="Save" value=""/>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên Tour: </label>
                        <input type="text" name="name" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ảnh minh họa: </label>
                        <div class="right-wrap-field">
                            <input type="file" name="fileupload" id="fileupload" />
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Nơi khởi hành: </label>
                        <input type="text" name="address" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ngày khởi hành: </label>
                        <input type="date" name="start" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ngày kết thúc: </label>
                        <input type="date" name="end" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    
                    <div class="wrap-field" >
                        <label></label>
                        <input type="button" title="plus" value="Add" onclick=plussService() />
                        <input type="button" title="delete" value="Del" onclick=deleteService() />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field" >
                        <label>ID Dịch vụ: </label>
                        <input type="number" name="service0" min="1" step="1" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <?php for($i=1;$i<20;$i++){
                    echo '<div class="wrap-field" id="service'.$i.'" style="display:none">
                        <label>ID Dịch vụ '.$i.': </label>
                        <input type="number" name="service'.$i.'" min="1" step="1" value="" />
                        <div class="clear-both"></div>
                    </div>'   ; 
            }?>
                    
                    
                    <div class="wrap-field" >
                        <label></label>
                        <input type="button" title="plus" value="Add" onclick=plussPlace() />
                        <input type="button" title="delete" value="Del" onclick=deletePlace() />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field" >
                        <label>ID địa điểm: </label>
                        <input type="number" name="place0" min="1" step="1" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <?php for($i=1;$i<20;$i++){
                    echo '<div class="wrap-field" id="place'.$i.'" style="display:none">
                        <label>ID địa điểm '.$i.': </label>
                        <input type="number" name="place'.$i.'" min="1" step="1" value="" />
                        <div class="clear-both"></div>
                    </div>'   ; 
            }?>
                    <div class="wrap-field">
                        <label>Số lượng chỗ: </label>
                        <input type="number"  name="numbers" min="0" step="1" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Trạng thái tour: </label>
                        <select name="status">
                            <option value="Còn chỗ" selected>Còn chỗ</option>
                            <option value="Hết chỗ">Hết chỗ</option>
                            <option value="Đã khơỉ hành">Đã khơỉ hành</option>
                            <option value="Đã kết thúc">Đã kết thúc</option>
                        </select>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá tour: </label>
                        <input type="number" name="price" min="0" step="1000" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Lịch trình tour: </label>
                        <textarea name="timetable" id="timetable"></textarea>
                        <div class="clear-both"></div>
                    </div>
                </form>
                <div class="clear-both"></div>
            <?php } ?>
        </div>
    </div>

    <?php
include './footer.php';
?>