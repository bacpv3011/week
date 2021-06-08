
<?php
include 'header.php';
?>
    <div class="main-content">
        <h1>Đặt tour</h1>
        <div class="go-back">
            <a href="./header.php">Trở lại</a>
        </div>
        <div id="content-box">
            <?php
            include 'function.php';
                $filePath = "../data/data/account/account.txt";
                $myfile = fopen($filePath, "r");
                $first = fgets($myfile);
                
                while(!feof($myfile)) {
                    $id1 =  fgets($myfile);
                    $username1 =  fgets($myfile);
                    $password1 =  fgets($myfile);
                    $role1 = fgets($myfile);
                    $name1 =  fgets($myfile);
                    $sex1 = fgets($myfile);
                    $date1 =  fgets($myfile);
                    $address1 =  fgets($myfile);
                    $phone1 = fgets($myfile);
                    $email1 =  fgets($myfile);
                    break;
                }
                fclose($myfile);
                
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
            <h2>Thông tin cá nhân</h2>
                <div id="place-form">
                    <div class="wrap-field">
                        <label>Tên: </label>
                        <p><?php echo $name1?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Địa chỉ: </label>
                        <p><?php echo $address1?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>SĐT: </label>
                        <p><?php echo $phone1?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>email: </label>
                        <p><?php echo $email1?></p>
                        <div class="clear-both"></div>
                    </div>
                    
                    <h2>Thông tin tour</h2>
                    <div class="wrap-field">
                        <label>Tên tour: </label>
                        <p><?php echo $name?></p>
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
                        <label>Giá: </label>
                        <p><?php echo $price?></p>
                        <div class="clear-both"></div>
                    </div>
                    <form method="post" action='./tour_success.php?id=<?=$id?>'>
                    <div class="wrap-field">
                        <label>Số lượng vé mua: </label>
                        <input type="number" name="number" min="1" step="1" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label> </label>
                        <input type="submit" title="Đặt tour" value=""/>
                        <div class="clear-both"></div>
                    </div>
                   </form>
                </div>
                <div class="clear-both"></div>
        </div>
    </div>

    <?php
include './footer.php';
?>