<?php 
$host = 'localhost';
$user ='root';
$pass = '';
$db_name = 'hotelBooking';
$con = mysqli_connect($host,$user,$pass,$db_name);

if (!$con) {
  die('connection Faild'. mysqli_connect_errno());
}
function filtration($data){
  foreach($data as $key=>$value){
   $value = trim($value);
   $value = stripslashes($value);
   $value = strip_tags($value);
   $value = htmlspecialchars($value);
   $data[$key] = $value;

  }
  return $data;
}

define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'].'/Hotel-Booking/Hotel-Booking-System.io/image/');
define('ABOUT_US','admin/');

function uploadImage($image, $folder){
  $valid_mime = ['image/jpg','image/jpeg','image/png',];
  $image_mime =['type'];
  
  if(in_array($image_mime,$valid_mime)){
    return 'inv_img'; // invalid image extension or formate
  }
  else if (($image['size']/(1024*1024))>2) {
    return "inv_img"; // invalid size greater than 2mb
  }
  else {
    $ext =pathinfo($image['name'],PATHINFO_EXTENSION);
    $rname = 'IMG_'.random_int(11111,99999).".$ext";
    $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
    if (move_uploaded_file($image['tmp_name'], $img_path)) {
      return $rname;
    }else{
      return 'upd_failed'; 
    }
  }
}
function insert($sql, $values, $datatype){
  $con = $GLOBALS['con'];
  if($stmt = mysqli_prepare($con, $sql)){
    mysqli_stmt_bind_param($stmt, $datatype, ...$values);
    if(mysqli_stmt_execute($stmt)){
      $res= mysqli_stmt_affected_rows($stmt);
      mysqli_stmt_close($stmt);
      return $res;
    }else{
      mysqli_stmt_close($stmt);
      die('Query cannot be existed -Insert');
    }
  }else{
    die('Query cannot be prepared -Insert');
  }
}
