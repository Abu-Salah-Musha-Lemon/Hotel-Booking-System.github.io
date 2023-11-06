<?php

define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'].'/Hotel-Booking/image/');
define('ABOUT_US','about');

function adminLogin(){
  session_start();
  if (!(($_SESSION['adminLogin'])&& $_SESSION['adminId']==true)) { 
    echo"
    <script>window.location.href='index.php';</script>";
  }
  session_regenerate_id(); // creat new sesson 
}

function redirect($url){
  echo"
   <script>window.location.href='$url';</script>";
}
function alert($type, $msg){
  $bs_class = ($type == 'success')? "alert-success":"alert-danger";
  echo <<<alert
        <div class="alert $bs_class alert-dismissible fade show" role="alert">
        <strong>$msg</strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    alert;
}

function uploadImage($image, $folder){
  $valid_mime = ['image/jpg','image/jpeg','image/png',];
  $image_mime =['type'];
  
  if(!in_array($image_mine,$valid_mime)){
    return 'inv_img'; // invalid image extention or formate
  }elseif (($image['size']/(1024*1024))>2) {
    return "inv_img"; // invalid size greater tham 2mb
  }else {
    $ext =pathinfo($image['name'],PATHINFO_EXTENTION);
    $rname = 'IMG_'.random_int(11111,99999).".$ext";
    $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
    if (move_uploaded_file($image['name'], $img_path)) {
      return $rname;
    }else{
      return 'upd_failed';
    }
  }
}

?>