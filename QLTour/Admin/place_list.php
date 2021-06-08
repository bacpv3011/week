<?php
include 'header.php';

$id = array();
$name = array();
$address = array();
$img = array();
$content =array();

$filePath = "../data/data/place/place.txt";
$line = 0;
$myfile = fopen($filePath, "r");
$first = fgets($myfile);

while(!feof($myfile)) {
    
    $id[] =  fgets($myfile);
    $name[] =  fgets($myfile);
    $address[] =  fgets($myfile);
    $img[] =  fgets($myfile);
    
    $buff="";
    while(!feof($myfile)) {
        $tmp = fgets($myfile);
        if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
            break;
        }
        
        $buff = $buff.$tmp."\n";
    }
    $content[] = $buff;
}
fclose($myfile);


?>
    <div class="main-content">
        <h1>Danh sách địa điểm</h1>
        <div class="place-items">
            <div  class="search">
              <form method="POST" action="?action=search">
                Tìm kiếm: <input type="text" name="text" />
                <input type="submit" name="search" value="search" />
                <br>
                <br>
                <input type="radio" name="radio" value="name" checked="checked">Tên
                <br>
                <input type="radio" name="radio" value="address">Địa chỉ
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
                            if(is_numeric(strpos($address[$i],$searchContent))){
                                $index [] = $i;
                            }
                        }
                    }
                    echo "Tìm bằng".(($type == "name")?"tên":"địa chỉ").": ".$_POST['text'] ;
                }else {
                    for($i = 0; $i < count($name); $i++){
                        $index [] = $i;
                    }
                    echo "Tìm bằng".(($_POST['radio'] == "name")?"tên":"địa chỉ");
                }
            }else{
                for($i = 0; $i < count($name); $i++){
                    $index [] = $i;
                }
            }
                
        ?>
            
            <div class="buttons">
                <a href="./place_add.php">Thêm địa điểm</a>
            </div>
            <ul>
                <li class="place-item-heading">
                    <div class="place-prop place-img">Ảnh</div>
                    <div class="place-prop place-id">ID</div>
                    <div class="place-prop place-name">Tên địa điểm</div>
                    <div class="place-prop place-name">Địa chỉ</div>
                    <div class="place-prop place-button">Chi tiết</div>
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
                        <div class="place-prop place-img"><img src="<?= $img[$index[$i]] ?>" alt="<?= $name[$index[$i]] ?>" title="<?= $name[$index[$i]] ?>" /></div>
                        <div class="place-prop place-id"><?= $id[$index[$i]] ?></div>
                        <div class="place-prop place-name"><?= $name[$index[$i]] ?></div>
                        <div class="place-prop place-name"><?= $address[$index[$i]] ?></div>
                        <div class="place-prop place-button">
                            <a href="./place_detail.php?id=<?= $id[$index[$i]] ?>">Chi tiết</a>
                        </div>
                        <div class="place-prop place-button">
                            <a href="./place_delete.php?id=<?= $id[$index[$i]] ?>" onclick="return confirm('Are you sure you want to delete?')">Xóa</a>
                        </div>
                        <div class="place-prop place-button">
                            <a href="./place_edit.php?id=<?= $id[$index[$i]] ?>">Sửa</a>
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