
<?php
include 'header.php';
?>
    <div class="main-content">
        <h1>Thông tin cá nhân</h1>
        <div class="go-back">
            <a href="./header.php">Trở lại</a>
        </div>
        <div class="go-back">
            <a href="./header.php">Chỉnh sửa</a>
        </div>
        <div id="content-box">
            <?php
            include 'function.php';
                $filePath = "../data/data/account/account.txt";
                $myfile = fopen($filePath, "r");
                $first = fgets($myfile);
                
                while(!feof($myfile)) {
                    $id =  fgets($myfile);
                    $username =  fgets($myfile);
                    $password =  fgets($myfile);
                    $role = fgets($myfile);
                    $name =  fgets($myfile);
                    $sex = fgets($myfile);
                    $date =  fgets($myfile);
                    $address =  fgets($myfile);
                    $phone = fgets($myfile);
                    $email=  fgets($myfile);
                    break;
                }
                fclose($myfile);
            ?>  
                <div id="place-form">
                    <div class="wrap-field">
                        <label>Mã khách hàng: </label>
                        <p><?php echo $id?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Tên: </label>
                        <p><?php echo $name?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giới tính: </label>
                        <p><?php echo $sex?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ngày sinh: </label>
                        <p><?php echo $date?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Địa chỉ: </label>
                        <p><?php echo $address?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>SĐT: </label>
                        <p><?php echo $phone?></p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>email: </label>
                        <p><?php echo $email?></p>
                        <div class="clear-both"></div>
                    </div>
                </div>
                <div class="clear-both"></div>
        </div>
    </div>

    <?php
include './footer.php';
?>