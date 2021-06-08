<?php
include 'header.php';

$idnote = array();
$id = array();
$id1 = array();
$number = array();
$indxx = array();
$status = array();

$filePath = "../data/data/booked/tour_booked.txt";
$line = 0;
$myfile = fopen($filePath, "r");
$first = fgets($myfile);

while(!feof($myfile)) {
    
    $idnote[] =  fgets($myfile);
    $id[] =  fgets($myfile);
    $id1[] =  fgets($myfile);
    $number[] =  fgets($myfile);
    $indxx[] = fgets($myfile);
    $status[] =  fgets($myfile);
    $tmp =  fgets($myfile);
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
            <ul>
                <li class="place-item-heading">
                    <div class="place-prop tour-book">Mã phiếu</div>
                    <div class="place-prop tour-book">Mã tour</div>
                    <div class="place-prop tour-book">Mã khách hàng</div>
                    <div class="place-prop tour-book">Số vé</div>
                    <div class="place-prop tour-book">Tổng tiền</div>
                    <div class="place-prop tour-book">Trạng thái</div>
                    <div class="place-prop place-button">Chi tiết</div>
                    <div class="place-prop place-button">
                        Hủy
                    </div>
                    <div class="place-prop place-button">
                        Sửa
                    </div>
                    <div class="clear-both"></div>
                </li>
                <?php
                
                for($i = 0; $i <count($idnote); $i++) {
                    ?>
                    
                    <li>
                        <div class="place-prop tour-book"><?= $idnote[$i] ?></div>
                        <div class="place-prop tour-book"><?= $id[$i]?></div>
                        <div class="place-prop tour-book"><?= $id1[$i] ?></div>
                        <div class="place-prop tour-book"><?= $number[$i] ?></div>
                        <div class="place-prop tour-book"><?= $indxx[$i] ?></div>
                        <div class="place-prop tour-book"><?= $status[$i] ?></div>
                        <div class="place-prop place-button">
                            <a href="./tour_booked_detail.php?id=<?= $idnote[$i] ?>">Chi tiết</a>
                        </div>
                        <div class="place-prop place-button">
                            <a href="./tour_booked_cancel.php?id=<?= $idnote[$i] ?>" >Hủy</a>
                        </div>
                        <div class="place-prop place-button">
                            <a href="./tour_booked_edit.php?id=<?= $idnote[$i] ?>" >Sửa</a>
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