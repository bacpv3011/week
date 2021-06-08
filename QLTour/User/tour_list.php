<?php
include 'header.php';

$id = array();
$name = array();
$start = array();
$status = array();
$img = array();
$address = array();
$end = array();
$number2 = array();
$price = array();

$filePath = "../data/data/tour/tour.txt";
$line = 0;
$myfile = fopen($filePath, "r");
$first = fgets($myfile);

while(!feof($myfile)) {
    
    $id[] =  fgets($myfile);
    $name[] =  fgets($myfile);
    $img[] =  fgets($myfile);
    $address[] =  fgets($myfile);
    $start[] = fgets($myfile);
    $end[] =  fgets($myfile);
    $price[] =  fgets($myfile);
    $status[] = fgets($myfile);
    $tmp =  fgets($myfile);
    $number2[] =  fgets($myfile);
    $tmp =  fgets($myfile);
    
    $buff="";
    while(!feof($myfile)) {
        $tmp = fgets($myfile);
        if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
            break;
        }
    }
}
fclose($myfile);


?>
    <div class="main-content">
        <h1>Tìm kiếm tour</h1>
        <div class="place-items">
            <div  class="search">
              <form class="formm" method="POST" action="?action=search">
                Tìm kiếm: <input type="text" name="text" />
                <input type="submit" name="search" value="search" />
                <br>
              </form>
            </div>
            <?php 
            $index = array();
            if(isset($_GET['action']) && $_GET['action'] == 'search'){
                if (isset($_POST['text']) && !empty($_POST['text'])) {
                    $searchContent = $_POST['text'];
                    $type = $_POST['radio'];
                    $counttt = 0;
                    for($i = 0; $i < count($name); $i++){
                        if(is_numeric(strpos($name[$i],$searchContent))){
                            $index [] = $i;
                            $counttt++;
                        }
                    }
                    echo "Tìm thấy ".$counttt. " kết quả";
                }else {
                    $counttt = 0;
                    for($i = 0; $i < count($name); $i++){
                        $index [] = $i;
                        $counttt++;
                    }
                    echo "Tìm thấy ".$counttt. " kết quả";
                }
            }else{
                for($i = 0; $i < count($name); $i++){
                    $index [] = $i;
                }
            }
                
        ?>
            <ul>
                <li class="place-item-heading">
                    <div class="place-prop tour-username">Tên tour</div>
                    <div class="place-prop tour-username">Nơi KH</div>
                    <div class="place-prop tour-username">Ngày KH</div>
                    <div class="place-prop tour-username">Ngày KT</div>
                    <div class="place-prop tour-username">Trạng thái</div>
                    <div class="place-prop tour-username">Ghế trống</div>
                    <div class="place-prop tour-username">Giá tour</div>
                    <div class="place-prop place-button">Chi tiết</div>
                    <div class="place-prop place-button">
                        Đặt
                    </div>
                    <div class="clear-both"></div>
                </li>
                <?php
                
                for($i = 0; $i <count($index); $i++) {
                    ?>
                    
                    <li>
                        <div class="place-prop tour-username"><?= $name[$index[$i]] ?></div>
                        <div class="place-prop tour-username"><?= $address[$index[$i]] ?></div>
                        <div class="place-prop tour-username"><?= $start[$index[$i]] ?></div>
                        <div class="place-prop tour-username"><?= $end[$index[$i]] ?></div>
                        <div class="place-prop tour-username"><?= $status[$index[$i]] ?></div>
                        <div class="place-prop tour-username"><?= $number2[$index[$i]] ?></div>
                        <div class="place-prop tour-username"><?= $price[$index[$i]] ?></div>
                        <div class="place-prop place-button">
                            <a href="./tour_detail.php?id=<?= $id[$index[$i]] ?>">Chi tiết</a>
                        </div>
                        <div class="place-prop place-button">
                            <a href="./tour_book.php?id=<?= $id[$index[$i]] ?>" >Đặt tour</a>
                        </div>
  
                        <div class="clear-both"></div>
                    </li>
                <?php }  ?>
            </ul>
        </div>
    </div>
    <?php
include './footer.php';
?>