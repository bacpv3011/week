<?php
include 'header.php';
?>
    <div class="main-content">
        <h1>Chi tiết tour</h1>
        <div class="go-back">
            <a href="./tour_list.php">Trở lại</a>
        </div>
        <div id="content-box">
            <?php
            include 'function.php';
                $idCurrent = $_GET['id'];
                $filePath = "../data/data/tour/tour.txt";
                $myfile = fopen($filePath, "r");
                $first = fgets($myfile);
                
                while(!feof($myfile)) {
                    
                    $id=  fgets($myfile);
                    $name=  fgets($myfile);
                    $img=  fgets($myfile);
                    $address =  fgets($myfile);
                    $start=  fgets($myfile);
                    $end=  fgets($myfile);
                    $price=  fgets($myfile);
                    $status=  fgets($myfile);
                    $numbers=  fgets($myfile);
                    $numbers2=  fgets($myfile);
                    $tmp1=  fgets($myfile);
                    $tmp2=  fgets($myfile);
                    
                    $buff="";
                    while(!feof($myfile)) {
                        $tmp = fgets($myfile);
                        if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
                            break;
                        }
                        
                        $buff = $buff.$tmp.'<br>';
                    }
                    $content= $buff;
                    if(strcmp($idCurrent."\n",$id)==0){
                        $service = getNameService($tmp1);
                        $place = getNamePlace($tmp2);
                        break;
                    }
                }
                
                fclose($myfile);
                
            ?>  
                <div id="place-form">
                    <div class="wrap-field">
                        <label>Tên tour: </label>
                        <p><?php echo $name?></p>
                        <div class="clear-both"></div>
                    </div>
                    
                     <div class="wrap-field">
                        <label>Ảnh minh họa: </label>
                        <div class="right-wrap-field">
                            <img src="<?= $img ?>" alt="<?= $name?>" title="<?= $name?>" />
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    
                    <div class="wrap-field">
                        <label>Nơi khởi hành: </label>
                        <p><?php echo $address?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ngày khởi hành: </label>
                        <p><?php echo $start?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ngày kết thúc: </label>
                        <p><?php echo $end?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Dịch vụ: </label>
                        <p><?php echo $service?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Địa điểm </label>
                        <p><?php echo $place?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Số lượng chỗ</label>
                        <p><?php echo $numbers?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Số chỗ còn lại</label>
                        <p><?php echo $numbers2?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá tour</label>
                        <p><?php echo $price?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Trạng thái tour</label>
                        <p><?php echo $status?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Lịch trình tour</label>
                        <p><?php echo $content?></p>
                        <div class="clear-both"></div>
                    </div>
                </div>
                <div class="clear-both"></div>
        </div>
    </div>

    <?php
include './footer.php';
?>