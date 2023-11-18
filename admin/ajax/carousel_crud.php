<?php
require_once '../inc/config.php';
require_once '../inc/essential.php';
adminLogin();


//  finale compleat 
if (isset($_POST['add_image'])) {


  $img_re = uploadImage($_FILES['picture'], CAROUSEL_US);

  if ($img_re == 'inv_img') {
     echo $img_re;
  } else if ($img_re == 'inv_size') {
     echo $img_re;
  } else if ($img_re == 'upd_failed') {
     echo $img_re;
  } else {
     $q = "INSERT INTO `carousel`(`db_picture`) VALUES (?)";
     $value = [ $img_re];
     $res = insert($q, $value, 's');
      echo $res;
  }
}


if(isset($_POST['get_carousel'])){
   $res = selectAll('carousel');
   $path = CAROUSEL_IMG_PATH;
   while ($row = mysqli_fetch_assoc($res)) {
      echo <<<data
               <div class="col-md-2 mb-3">
                     <div class="card bg-dark text-white text-end ">
                     <img src="$path$row[db_picture]" class="card-img">
                        <div class="card-img-overlay">
                              <button type="button" onclick='rem_image($row[sr_no])' class="btn btn-danger btn-sm shadow-none"><i class="bi bi-person-dash-fill"></i></button>
                           </div>
                        </div>
               </div>
      data;
   }
}


if (isset($_POST['rem_image'])) {
   $frm_data = filtration($_POST);
   $value = [$frm_data['rem_image']];
   $pre_Q = " SELECT * FROM `carousel` WHERE `sr_no` = ?";
   $res = select($pre_Q, $value,'i');
   $img = mysqli_fetch_assoc($res);
   if (deleteImage($img['db_picture'],CAROUSEL_US)) {
      $q = "DELETE FROM `carousel` WHERE `sr_no`=?";
      $res = delete($q,$value,'i');
      echo $res;
   }else{ echo 0;}
}


















