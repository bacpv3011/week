<?php
function uploadFiles($file){
    $target_dir    = "../data/img/";
    $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
    
    if (!file_exists($target_file)){
        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file);
    }
    
}

function checkPlaceIsExisted($name){
    $filePath = "../data/data/place/place.txt";
    $myfile = fopen($filePath, "r");
    $first = fgets($myfile);
    
    while(!feof($myfile)) {
        
        $id=  fgets($myfile);
        $placeName=  fgets($myfile);
        if(strcmp($placeName,$name."\n")==0){
            return true;
        }
        $address =  fgets($myfile);
        $img=  fgets($myfile);
        
        $buff="";
        while(!feof($myfile)) {
            $tmp = fgets($myfile);
            if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
                break;
            }
            
            $buff = $buff.$tmp."\n";
        }
        $content = $buff;
    }
    fclose($myfile);
    return false;
}

function addPlaceToFile($name,$address,$file,$content){
    $filePath = "../data/data/place/place.txt";
    $filePath2 = "../data/data/place/count.txt";
    $myfile2 = fopen($filePath2, "r");
    $id = fgets($myfile2);
    fclose($myfile2);
    
    $tmp = (int)$id;
    $tmp += 1;
    $id = (string)$tmp;
    $txt ="\n". $id . "\n".
        $name ."\n".
        $address ."\n".
        $file ."\n".
        $content ."\n".
        "--------------_____";
        
        
        $myfile = fopen($filePath, "a");
        fwrite($myfile, $txt);
        fclose($myfile);
        
        $myfile2 = fopen($filePath2, "w");
        fwrite($myfile2, $id);
        fclose($myfile2);
}
function editPlace($id,$name,$address,$img,$content){
    $lines = array();
    $filePath = "../data/data/place/place.txt";
    $myfile = fopen($filePath, "r");
    $lines[] = fgets($myfile);
    while(!feof($myfile)) {
        $buff="";
        $idCurrent = fgets($myfile);
        
        if(strcmp($idCurrent,$id)==0){
            $lines[] = $idCurrent;
            $lines[] = $name."\n";
            $lines[] =$address."\n";
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            
            if(strcmp($img, "0")==0){
                $lines[] = fgets($myfile);
                
            }else{
                $lines[] = $img."\n";
            }
            $buff =  fgets($myfile);
            
            while(!feof($myfile)) {
                $tmp = fgets($myfile);
                if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
                    break;
                }
            }
            $lines[] = $content;
            $lines[] =  $tmp;
            continue;
            
        } else{
            $lines[] = $idCurrent;
        }
            
            $lines[] =  fgets($myfile);
            $lines[] =  fgets($myfile);
            $lines[] =  fgets($myfile);
            
        $buff="";
        while(!feof($myfile)) {
            $tmp = fgets($myfile);
            if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
                $buff = $buff.$tmp;
                break;
            }
            
            $buff = $buff.$tmp;
        }
        $lines[] = $buff;
    }
    fclose($myfile);
    
    $myfile = fopen($filePath, "w");
    for($i = 0; $i <count($lines); $i++){
        fwrite($myfile, $lines[$i]);
    }
    fclose($myfile);
}


function deletePlace($id){
    $lines = array();
    $filePath = "../data/data/place/place.txt";
    $myfile = fopen($filePath, "r");
    $lines[] = fgets($myfile);
    
    while(!feof($myfile)) {
        $buff="";
        $idCurrent = fgets($myfile);
        
        if(strcmp($idCurrent,$id."\n")==0){
            $buff = fgets($myfile);
            $buff = fgets($myfile);
            $buff = fgets($myfile);
            
            while(!feof($myfile)) {
                $tmp = fgets($myfile);
                if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
                    break;
                }
            }
            continue;
        } 
        $lines[] = $idCurrent;
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        
        $buff="";
        while(!feof($myfile)) {
            $tmp = fgets($myfile);
            if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
                $buff = $buff.$tmp;
                break;
            }
            
            $buff = $buff.$tmp;
        }
        $lines[] = $buff;
    }
    
    fclose($myfile);
    
    $lines[count($lines)-1]= "--------------_____";
    $myfile = fopen($filePath, "w");
    for($i = 0; $i <count($lines); $i++){
        fwrite($myfile, $lines[$i]);
    }
    fclose($myfile);
}
function addHotelToFile($name,$address,$quality,$price,$content){
    $filePath = "../data/data/service/hotel.txt";
    $filePath2 = "../data/data/service/count.txt";
    $myfile2 = fopen($filePath2, "r");
    $id = fgets($myfile2);
    fclose($myfile2);
    
    $tmp = (int)$id;
    $tmp += 1;
    $id = (string)$tmp;
    $txt ="\n". $id . "\n".
        $name ."\n".
        $address ."\n".
        $quality ."\n".
        $price ."\n".
        $content ."\n".
        "--------------_____";
        
        
        $myfile = fopen($filePath, "a");
        fwrite($myfile, $txt);
        fclose($myfile);
        
        $myfile2 = fopen($filePath2, "w");
        fwrite($myfile2, $id);
        fclose($myfile2);
}
function editHotel($id,$name,$address,$quality,$price,$content){
    $lines = array();
    $filePath = "../data/data/service/hotel.txt";
    $myfile = fopen($filePath, "r");
    $lines[] = fgets($myfile);
    while(!feof($myfile)) {
        $buff="";
        $idCurrent = fgets($myfile);
        
        if(strcmp($idCurrent,$id)==0){
            $lines[] = $idCurrent;
            $lines[] = $name."\n";
            $lines[] =$address."\n";
            $lines[] =$quality."\n";
            $lines[] =$price."\n";

            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            
            while(!feof($myfile)) {
                $tmp = fgets($myfile);
                if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
                    break;
                }
            }
            $lines[] = $content."\n";
            $lines[] =  fgets($myfile);
            
        } else{
            $lines[] = $idCurrent;
        }
        
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        
        $buff="";
        while(!feof($myfile)) {
            $tmp = fgets($myfile);
            if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
                $buff = $buff.$tmp;
                break;
            }
            
            $buff = $buff.$tmp;
        }
        $lines[] = $buff;
    }
    fclose($myfile);
    
    $myfile = fopen($filePath, "w");
    for($i = 0; $i <count($lines); $i++){
        fwrite($myfile, $lines[$i]);
    }
    fclose($myfile);
}

function deleteHotel($id){
    $lines = array();
    $filePath = "../data/data/service/hotel.txt";
    $myfile = fopen($filePath, "r");
    $lines[] = fgets($myfile);
    
    while(!feof($myfile)) {
        $buff="";
        $idCurrent = fgets($myfile);
   
        if(strcmp($idCurrent,$id."\n")==0){
            $buff = fgets($myfile);
            $buff = fgets($myfile);
            $buff = fgets($myfile);
            $buff = fgets($myfile);
            
            while(!feof($myfile)) {
                $tmp = fgets($myfile);
                if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
                    break;
                }
            }
            continue;
        }
        $lines[] = $idCurrent;
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] = fgets($myfile);
        
        $buff="";
        while(!feof($myfile)) {
            $tmp = fgets($myfile);
            if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
                $buff = $buff.$tmp;
                break;
            }
            
            $buff = $buff.$tmp;
        }
        $lines[] = $buff;
    }
    
    fclose($myfile);
    
    $lines[count($lines)-1]= "--------------_____";
    $myfile = fopen($filePath, "w");
    for($i = 0; $i <count($lines); $i++){
        fwrite($myfile, $lines[$i]);
    }
    fclose($myfile);
}

function addVehicleToFile($name,$type,$num,$price,$brand,$date,$status){
    $filePath = "../data/data/service/vehicle.txt";
    $filePath2 = "../data/data/service/count.txt";
    $myfile2 = fopen($filePath2, "r");
    $id = fgets($myfile2);
    fclose($myfile2);
    
    $tmp = (int)$id;
    $tmp += 1;
    $id = (string)$tmp;
    $txt ="\n". $id . "\n".
        $name ."\n".
        $type ."\n".
        $num ."\n".
        $price ."\n".
        $brand ."\n".
        $date ."\n".
        $status ."\n".
        "--------------_____";
        
        
        $myfile = fopen($filePath, "a");
        fwrite($myfile, $txt);
        fclose($myfile);
        
        $myfile2 = fopen($filePath2, "w");
        fwrite($myfile2, $id);
        fclose($myfile2);
}

function editVehicle($id,$name,$type,$num,$price,$brand,$date,$status){
    $lines = array();
    $filePath = "../data/data/service/vehicle.txt";
    $myfile = fopen($filePath, "r");
    $lines[] = fgets($myfile);
    while(!feof($myfile)) {
        $buff="";
        $idCurrent = fgets($myfile);
        
        if(strcmp($idCurrent,$id)==0){
            $lines[] = $idCurrent;
            $lines[] = $name."\n";
            $lines[] =$type."\n";
            $lines[] =$num."\n";
            $lines[] =$price."\n";
            $lines[] =$brand."\n";
            $lines[] =$date."\n";
            $lines[] =$status."\n";
            
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);

            $lines[] =  fgets($myfile);
            
        } else{
            $lines[] = $idCurrent;
        }
        
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
    }
    fclose($myfile);
    
    $myfile = fopen($filePath, "w");
    for($i = 0; $i <count($lines); $i++){
        fwrite($myfile, $lines[$i]);
    }
    fclose($myfile);
}
function deleteVehicle($id){
    $lines = array();
    $filePath = "../data/data/service/vehicle.txt";
    $myfile = fopen($filePath, "r");
    
    $lines[] = fgets($myfile);
    
    while(!feof($myfile)) {
        $buff="";
        $idCurrent = fgets($myfile);
        
        if(strcmp($idCurrent,$id."\n")==0){
            $buff = fgets($myfile);
            $buff = fgets($myfile);
            $buff = fgets($myfile);
            $buff = fgets($myfile);
            $buff = fgets($myfile);
            $buff = fgets($myfile);
            $buff = fgets($myfile);
            $buff = fgets($myfile);
            continue;
        }
        $lines[] = $idCurrent;
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);}
    
    fclose($myfile);
    
    $lines[count($lines)-1]= "--------------_____";
    $myfile = fopen($filePath, "w");
    for($i = 0; $i <count($lines); $i++){
        fwrite($myfile, $lines[$i]);
    }
    fclose($myfile);
}

function addTour($name,$file,$address,$start,$end,$price,$status,$number,$timetable,$place,$device){
    $filePath = "../data/data/tour/tour.txt";
    $filePath2 = "../data/data/tour/count.txt";
    $myfile2 = fopen($filePath2, "r");
    $id = fgets($myfile2);
    fclose($myfile2);
    
    $tmp = (int)$id;
    $tmp += 1;
    $id = (string)$tmp;
    
    $tmp_device = "";
    $tmp_place = "";
    
    
    for($i = 0; $i < count($device); $i++){
        $tmp_device =  $tmp_device.$device[$i].",";
    }
    
    for($i = 0; $i < count($place); $i++){
        $tmp_place =  $tmp_place.$place[$i].",";
    }
    
    $txt ="\n". $id . "\n".
        $name ."\n".
        $file."\n".
        $address ."\n".
        $start ."\n".
        $end."\n".
        $price ."\n".
        $status ."\n".
        $number."\n".
        $tmp_device."\n".
        $tmp_place."\n".
        $timetable ."\n".
        "--------------_____";
        
        
        $myfile = fopen($filePath, "a");
        fwrite($myfile, $txt);
        fclose($myfile);
        
        $myfile2 = fopen($filePath2, "w");
        fwrite($myfile2, $id);
        fclose($myfile2);
}

function getServiceNameById($id){
    $idCurrent = $id;
    $filePath = "../data/data/service/vehicle.txt";
    $myfile = fopen($filePath, "r");
    $first = fgets($myfile);
    
    while(!feof($myfile)) {
        
        $id = fgets($myfile);
        $name = fgets($myfile);
        $type = fgets($myfile);
        $num = fgets($myfile);
        $price = fgets($myfile);
        $brand = fgets($myfile);
        $date = fgets($myfile);
        $status = fgets($myfile);
        $buff = fgets($myfile);
        if(strcmp($idCurrent."\n",$id)==0){
            return $name;
        }
    }
    fclose($myfile);
    
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
            return $name;
        }
    }
    fclose($myfile);
    
}

function getNameService($tmp1){
    $service = "";
    $tmp = str_split($tmp1);
    $id = array();
    $buff = "";
    for($i = 0; $i <count($tmp)-1; $i++){
       
        if($tmp[$i] == ','){
            $id[] = $buff;
            $buff = "";
        }else{
            $buff = $buff.$tmp[$i];
        }
    }
    
    for($i = 0; $i <count($id); $i++){
        $service = $service.getServiceNameById($id[$i]).'<br>';
    }
    
    return $service;
}
function  getPlaceNameById($id){
    $idCurrent = $id;
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
            
            $buff = $buff.$tmp.'<br>';
        }
        $content= $buff;
        if(strcmp($idCurrent."\n",$id)==0){
            return $name;
        }
    }
    fclose($myfile);
}

function getNamePlace($tmp2){
    $place = "";
    $tmp = str_split($tmp2);
    $id = array();
    $buff = "";
    for($i = 0; $i <count($tmp)-1; $i++){
        
        if($tmp[$i] == ','){
            $id[] = $buff;
            $buff = "";
        }else{
            $buff = $buff.$tmp[$i];
        }
    }
    
    for($i = 0; $i <count($id); $i++){
        $place = $place.getPlaceNameById($id[$i]).'<br>';
    }
    
    return $place;
}

function addBookedTour($idnote, $id, $id1, $number,$indxx,$status){
    $filePath = "../data/data/booked/tour_booked.txt";
    $filePath2 = "../data/data/booked/count.txt";
    
    
    $txt ="\n". $idnote . "\n".
        $id .
        $id1.
        $number ."\n".
        $indxx ."\n".
        $status."\n".
        "--------------_____";
        
        
        $myfile = fopen($filePath, "a");
        fwrite($myfile, $txt);
        fclose($myfile);
        
        $myfile2 = fopen($filePath2, "w");
        fwrite($myfile2, $idnote);
        fclose($myfile2);
}
function editTour($id,$name,$file,$address,$start,$end,$price,$status,$number,$timetable,$place,$device){
    $lines = array();
    $filePath = "../data/data/place/place.txt";
    $myfile = fopen($filePath, "r");
    $lines[] = fgets($myfile);
    while(!feof($myfile)) {
        $buff="";
        $idCurrent = fgets($myfile);
        
        if(strcmp($idCurrent,$id)==0){
            $lines[] = $idCurrent;
            $lines[] = $name."\n";
            $lines[] =$address."\n";
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            
            if(strcmp($img, "0")==0){
                $lines[] = fgets($myfile);
                
            }else{
                $lines[] = $img."\n";
            }
            $buff =  fgets($myfile);
            
            while(!feof($myfile)) {
                $tmp = fgets($myfile);
                if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
                    break;
                }
            }
            $lines[] = $content;
            $lines[] =  $tmp;
            continue;
            
        } else{
            $lines[] = $idCurrent;
        }
        
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        
        $buff="";
        while(!feof($myfile)) {
            $tmp = fgets($myfile);
            if(strcmp($tmp, "--------------_____") == 0 || strcmp($tmp, "--------------_____\n") == 0) {
                $buff = $buff.$tmp;
                break;
            }
            
            $buff = $buff.$tmp;
        }
        $lines[] = $buff;
    }
    fclose($myfile);
    
    $myfile = fopen($filePath, "w");
    for($i = 0; $i <count($lines); $i++){
        fwrite($myfile, $lines[$i]);
    }
    fclose($myfile);
}

function acceptFunction($idnote,$id,$id1,$number,$indxx,$status,$tmp){
    $lines = array();
    $filePath = "../data/data/booked/tour_booked.txt";
    $myfile = fopen($filePath, "r");
    $lines[] = fgets($myfile);
    while(!feof($myfile)) {
        $buff="";
        $idCurrent = fgets($myfile);
        
        if(strcmp($idCurrent,$idnote)==0){
            $lines[] = $idCurrent;
            $lines[] = $id;
            $lines[] =$id1;
            $lines[] =$number;
            $lines[] =$indxx;
            $lines[] =$status."\n";
            $lines[] =$tmp;
            
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            $buff =  fgets($myfile);
            
        } else{
            $lines[] = $idCurrent;
        }
        
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
        $lines[] =  fgets($myfile);
    }
    fclose($myfile);
    
    $myfile = fopen($filePath, "w");
    for($i = 0; $i <count($lines); $i++){
        fwrite($myfile, $lines[$i]);
    }
    fclose($myfile);
}

?>