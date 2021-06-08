<?php
include 'header.php';
?>
    <div class="main-content">
        <h1>Xác thực tour</h1>
        <div id="content-box">
            <?php
            include 'function.php';
                $idnote= $_GET['id'];
                $idCurrent = $_GET['id'];
                
                $filePath = "../data/data/booked/tour_booked.txt";
                $line = 0;
                $myfile = fopen($filePath, "r");
                $first = fgets($myfile);
                while(!feof($myfile)) {
                    $idnote =  fgets($myfile);
                    $id =  fgets($myfile);
                    $id1 =  fgets($myfile);
                    $number =  fgets($myfile);
                    $indxx = fgets($myfile);
                    $stt =  fgets($myfile);
                    $tmp =  fgets($myfile);
                    if(strcmp($idCurrent."\n",$idnote)==0){
                        break;
                    }
                }
                fclose($myfile);
                acceptFunction($idnote,$id,$id1,$number,$indxx,"Đã xác thực",$tmp);
            ?>
                <div class = "container">
                    <div class = "error">Xác thực thành công</div>
                    <a href = "tour_booked_list.php">Quay lại</a>
                </div>
        </div>
    </div>

    <?php
include './footer.php';
?>