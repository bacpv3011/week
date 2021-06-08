<?php
include 'header.php';
?>
    <div class="main-content">
        <h1>Chi tiết địa điểm</h1>
        <div class="go-back">
            <a href="./hotel_list.php">Trở lại</a>
        </div>
        <div id="content-box">
            <?php
                $idCurrent = $_GET['id'];
                $filePath = "../data/data/service/hotel.txt";
                $myfile = fopen($filePath, "r");
                $first = fgets($myfile);
                
                while(!feof($myfile)) {
                    
                    $id=  fgets($myfile);
                    $name=  fgets($myfile);
                    $address =  fgets($myfile);
                    $quality=  fgets($myfile);
                    $price=  fgets($myfile);
                    
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
                        break;
                    }
                }
                fclose($myfile);
                
            ?>  
                <div id="place-form">
                    <div class="wrap-field">
                        <label>Tên địa điểm: </label>
                        <p><?php echo $name?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Địa chỉ: </label>
                        <p><?php echo $address?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Chất lượng: </label>
                        <p><?php echo $quality?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá: </label>
                        <p><?php echo $price?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Miêu tả: </label>
                        <p><?php echo $content?></p>
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