<?php
include 'header.php';

$id = array();
$name = array();
$type = array();
$num = array();
$price = array();
$brand =array();
$date =array();
$status =array();

$filePath = "../data/data/service/vehicle.txt";
$line = 0;
$myfile = fopen($filePath, "r");
$first = fgets($myfile);

while(!feof($myfile)) {
    
    $id[] = fgets($myfile);
    $name[] = fgets($myfile);
    $type[] = fgets($myfile);
    $num[] = fgets($myfile);
    $price[] = fgets($myfile);
    $brand[] = fgets($myfile);
    $date[] = fgets($myfile);
    $status[] = fgets($myfile);
    $buff = fgets($myfile);
}
fclose($myfile);


?>
    <div class="main-content">
        <h1>Danh sách phương tiện</h1>
        <div class="place-items">
            <div  class="search">
              <form method="POST" action="?action=search">
                Tìm kiếm: <input type="text" name="text" />
                <input type="submit" name="search" value="search" />
                <br>
                <br>
                <input type="radio" name="radio" value="name" checked="checked">Tên
                <br>
                <input type="radio" name="radio" value="num"> Số chỗ
              </form>
            </div>
            <?php 
            $index = array();
            if(isset($_GET['action']) && $_GET['action'] == 'search'){
                if (isset($_POST['text']) && !empty($_POST['text'])) {
                    $searchContent = $_POST['text'];
                    $type = $_POST['radio'];
                    if($type == "name"){
                        for($i = 0; $i < count($name); $i++){
                            if(is_numeric(strpos($name[$i],$searchContent))){
                                $index [] = $i;
                            }
                        }
                    }else{
                        for($i = 0; $i < count($name); $i++){
                            if(is_numeric(strpos($num[$i],$searchContent))){
                                $index [] = $i;
                            }
                        }
                    }
                    echo "Tìm bằng".(($type == "name")?"tên":"số lượng chỗ").": ".$_POST['text'] ;
                }else {
                    for($i = 0; $i < count($name); $i++){
                        $index [] = $i;
                    }
                    echo "Tìm bằng".(($_POST['radio'] == "name")?"tên":"số lượng chỗ");
                }
            }else{
                for($i = 0; $i < count($name); $i++){
                    $index [] = $i;
                }
            }
                
        ?>
            
            <div class="buttons">
                <a href="./vehicle_add.php">Thêm phương tiện</a>
            </div>
            <ul>
                <li class="place-item-heading">
                    <div class="place-prop place-id">ID</div>
                    <div class="place-prop vehicle-name">Tên phương tiện</div>
                    <div class="place-prop vehicle-name">Loại phương tiện</div>
                    <div class="place-prop vehicle-name">Số lượng chỗ</div>
                    <div class="place-prop vehicle-name">Giá </div>
                    <div class="place-prop place-button">
                        Chi tiết
                    </div>
                    <div class="place-prop place-button">
                        Xóa
                    </div>
                    <div class="place-prop place-button">
                       Sửa
                    </div>
                    <div class="clear-both"></div>
                </li>
               
               <?php 
                for($i = 0; $i <count($index); $i++) {
                    ?>
                    
                    <li>
                        <div class="place-prop place-id"><?= $id[$index[$i]] ?></div>
                        <div class="place-prop vehicle-name"><?= $name[$index[$i]] ?></div>
                        <div class="place-prop vehicle-name"><?= $type[$index[$i]] ?></div>
                        <div class="place-prop vehicle-name"><?= $num[$index[$i]] ?></div>
                        <div class="place-prop vehicle-name"><?= $price[$index[$i]] ?></div>
                        <div class="place-prop place-button">
                            <a href="./vehicle_detail.php?id=<?= $id[$index[$i]] ?>">Chi tiết</a>
                        </div>
                        <div class="place-prop place-button">
                            <a href="./vehicle_delete.php?id=<?= $id[$index[$i]] ?>" onclick="return confirm('Are you sure you want to delete?')">Xóa</a>
                        </div>
                        <div class="place-prop place-button">
                            <a href="./vehicle_edit.php?id=<?= $id[$index[$i]] ?>">Sửa</a>
                        </div>
                        <div class="clear-both"></div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php
include './footer.php';
?>