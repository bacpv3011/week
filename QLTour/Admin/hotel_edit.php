<?php
include 'header.php';
?>
    <div class="main-content">
        <h1>Sửa khách sạn</h1>
        <div id="content-box">
            <?php
            include 'function.php';
            if(isset($_GET['id'])){
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
                        
                        $buff = $buff.$tmp;
                    }
                    $content= $buff;
                    if(strcmp($idCurrent."\n",$id)==0){
                        break;
                    }
                }
                fclose($myfile);
            }
            
            
            if (isset($_GET['action']) && $_GET['action'] == 'change') {
                    if (isset($_POST['name']) && isset($_POST['address']) &&isset($_POST['content'])&&isset($_POST['quality']) && isset($_POST['price'])) {
                        if (empty($_POST['name'])) {
                            $error = "Chưa nhập tên địa điểm";
                        } elseif (empty($_POST['address'])) {
                            $error = "Chưa nhập địa điểm";
                        }elseif (empty($_POST['content'])) {
                            $error = "Miêu tả gì đó đi";
                        }elseif (empty($_POST['quality'])) {
                            $error = "Chưa nhập chất lượng";
                        }elseif (!empty($_POST['price']) && is_numeric(str_replace('.', '', $_POST['price'])) == false) {
                            $error = "Nhập lại giá đi";
                        }
                    
                        if(!isset($error)){
                            $name = $_POST['name'];
                            $address = $_POST['address'];
                            $quality = $_POST['quality'];
                            $price = $_POST['price'];
                            $content = $_POST['content'];
                            
                            editHotel($id,$name,$address,$quality,$price,$content);
                        }
                    
                } else {
                    $error = "Chưa nhập thông tin.";
            }
            ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Sửa thành công" ?></div>
                    <a href = "hotel_list.php">Quay lại danh sách khách sạn</a>
                </div>
            <?php } else { ?>
                <form id="place-form" method="POST" action="<?= "?action=change&id=".$_GET['id'] ?>" enctype="multipart/form-data">
                    <input type="submit" title="Save" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên khách sạn: </label>
                        <input type="text" name="name" value="<?= $name?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Địa chỉ: </label>
                        <input type="text" name="address" value="<?=$address?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Chất lượng: </label>
                        <input type="text" name="quality" value="<?=$quality?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá: </label>
                        <input type="text" name="price" value="<?=$price?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Miêu tả: </label>
                        <textarea name="content" id="content"><?=$content?></textarea>
                        <div class="clear-both"></div>
                    </div>
                </form>
                <div class="clear-both"></div>
                <script>
                </script>
            <?php } ?>
        </div>
    </div>

    <?php
include './footer.php';
?>