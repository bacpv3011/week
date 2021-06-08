<?php
include 'header.php';
?>
    <div class="main-content">
        <h1>Chi tiết địa điểm</h1>
        <div class="go-back">
            <a href="./vehicle_list.php">Trở lại</a>
        </div>
        <div id="content-box">
            <?php
                $idCurrent = $_GET['id'];
                $filePath = "../data/data/service/vehicle.txt";
                $myfile = fopen($filePath, "r");
                $first = fgets($myfile);
                
                while(!feof($myfile)) {
                    
                    $id = fgets($myfile);
                    $name = fgets($myfile);
                    $type = fgets($myfile);
                    $num = fgets($myfile);
                    $price = fgets($myfile);
                    $brand = fgets($myfile);
                    $date = fgets($myfile);
                    $status = fgets($myfile);
                    $buff = fgets($myfile);
                    if(strcmp($idCurrent."\n",$id)==0){
                        break;
                    }
                }
                fclose($myfile);
                
            ?>  
                <div id="place-form">
                    <div class="wrap-field">
                        <label>Tên phương tiện: </label>
                        <p><?php echo $name?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Loại phương tiện: </label>
                        <p><?php echo $type?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Số lượng chỗ: </label>
                        <p><?php echo $num?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá: </label>
                        <p><?php echo $price?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Thương hiệu: </label>
                        <p><?php echo $brand?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ngày sản xuất: </label>
                        <p><?php echo $date?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Tình trạng xe: </label>
                        <p><?php echo $status?></p>
                        <div class="clear-both"></div>
                    </div>
                </div>
                <div class="clear-both"></div>
                <script>
                </script>
        </div>
    </div>

    <?php
include './footer.php';
?>