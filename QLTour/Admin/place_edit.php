<?php
include 'header.php';
?>
    <div class="main-content">
        <h1>Sửa địa điểm</h1>
        <div id="content-box">
            <?php
            include 'function.php';
            if(isset($_GET['id'])){
                $idCurrent = $_GET['id'];
                $filePath = "../data/data/place/place.txt";
                $myfile = fopen($filePath, "r");
                $first = fgets($myfile);
                
                while(!feof($myfile)) {
                    
                    $id=  fgets($myfile);
                    $name=  fgets($myfile);
                    $address =  fgets($myfile);
                    $img=  fgets($myfile);
                    
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
                if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['address']) && !empty($_POST['address']) &&
                    isset($_POST['content']) && !empty($_POST['content'])) {
                    if (empty($_POST['name'])) {
                        $error = "Chưa nhập tên địa điểm";
                    } elseif (empty($_POST['address'])) {
                        $error = "Chưa nhập địa điểm";
                    }elseif (empty($_POST['content'])) {
                        $error = "Miêu tả gì đó đi";
                    }
                    
                    $name = $_POST['name'];
                    $address = $_POST['address'];

                    $content = $_POST['content'];
                    $filePath = "../data/data/place/place.txt";
                    if (isset($_FILES['fileupload']) && !empty($_FILES['fileupload']['name'])) {
                        $uploadedFiles = $_FILES['fileupload'];
                        uploadFiles($uploadedFiles);
                        $img = "../data/img/" . basename($_FILES["fileupload"]["name"]);
                        
                    }else{
                        $img = "0";
                    }
                    editPlace($id,$name,$address,$img,$content);
                    
                } else {
                    $error = "Chưa nhập thông tin.";
            }
            ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Sửa thành công" ?></div>
                    <a href = "place_list.php">Quay lại danh sách địa điểm</a>
                </div>
            <?php } else { ?>
                <form id="place-form" method="POST" action="<?= "?action=change&id=".$_GET['id'] ?>" enctype="multipart/form-data">
                    <input type="submit" title="Save" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên địa điểm: </label>
                        <input type="text" name="name" value="<?= $name?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Địa chỉ: </label>
                        <input type="text" name="address" value="<?=$address?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ảnh chi tiết: </label>
                        <div class="right-wrap-field">
                            <img src="<?= $img ?>" /><br/>
                            <input type="file" name="fileupload" value=""/>
                        </div>
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