
<?php
include 'header.php';
?>
    <div class="main-content">
        <h1>Đặt tour</h1>
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
                
                $number = $_POST['number'];
                
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
                
                $indxx = (int)$number * (int)$price;
                
                
                $filePath2 = "../data/data/booked/count.txt";
                $myfile2 = fopen($filePath2, "r");
                $idnote = fgets($myfile2);
                fclose($myfile2);
                
                $tmp = (int)$idnote;
                $tmp += 1;
                $idnote = (string)$tmp;
                
                addBookedTour($idnote, $id, $id1, $number,$indxx,"Chờ xác nhận")
            ?>  
                <form id="place-form" method="POST" action="./tour_list.php">
                    <input type="submit" title="Xác nhận" value=""/>
                    <h2>Đã đặt tour ... Chờ nhân viên xác thực</h2>
                    <div class="wrap-field">
                        <label>Mã phiếu: </label>
                        <p><?php echo $idnote?></p>
                        <div class="clear-both"></div>
                    </div>
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
                        <label>Số vé: </label>
                        <p><?php echo $number?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Tổng tiền: </label>
                        <p><?php echo $indxx?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Trạng thái: </label>
                        <p>Đang chờ duyệt</p>
                        <div class="clear-both"></div>
                    </div>
                   </form>
                <div class="clear-both"></div>
        </div>
    </div>

    <?php
include './footer.php';
?>