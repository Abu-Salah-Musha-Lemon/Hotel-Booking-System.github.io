<?php
require_once '../inc/config.php';
require_once '../inc/essential.php';
adminLogin();


//  add Features 
if (isset($_POST['add_features'])) {
  $frm_data = filtration($_POST); // Assuming filtration function is defined
   $q = "INSERT INTO `features`(`db_fea_name`) VALUES (?)";
  $value = [$frm_data['name']];
  $res = insert($q, $value, 's');
   echo $res;

}


if(isset($_POST['get_features'])){
   $res = selectAll('features');
   $i =1;
   while ($row = mysqli_fetch_assoc($res)) {
      echo <<<data

         <tr class="alight-middle">
            <td>$i</td>
            <td>$row[db_fea_name]</td>
            <td>
               <button type="button" onclick='rem_feature($row[sr_no])' class="btn btn-danger btn-sm shadow-none"><i class="bi bi-trash3"></i></button>
            </td>
         </tr>
       
      data;
    $i++ ;
   }
}

if (isset($_POST['rem_feature'])) {
   $frm_data = filtration($_POST);
   $value = [$frm_data['rem_feature']];

   $pre_Q = "DELETE FROM `features` WHERE `sr_no` = ?";
   echo $pre_Q;
   $res = delete($pre_Q, $value, 'i');
   echo $res;
}

//  add facilities
if (isset($_POST['add_facilities'])) {
   $frm_data = filtration($_POST); // Assuming filtration function is defined
 
   $img_re = uploadSVGImage($_FILES['icon'], FACILITIES_US);
 
   if ($img_re == 'inv_img') {
      echo $img_re;
   } else if ($img_re == 'inv_size') {
      echo $img_re;
   } else if ($img_re == 'upd_failed') {
      echo $img_re;
   } else {
      // do not use colon in the question mark sine
      $q = "INSERT INTO `facilities`(`db_name`, `db_icon`, `db_desc`) VALUES (?,?,?)";
      $value = [$frm_data['name'], $img_re,$frm_data['desc']];
      $res = insert($q, $value, 'sss');
      echo $res;
   }
}
 
if(isset($_POST['get_facilities'])){
   $res = selectAll('facilities');
   $path = FACILITIES_IMG_PATH;
   $i=1;
   while ($row = mysqli_fetch_assoc($res)) {
      echo <<<data
         <tr>
            <td>$i</td>
            <td>$row[db_name]</td>
            <td><img src="$path$row[db_icon]" style="width:50px;height:50px" class="card-img"></td>
            <td>$row[db_desc]</td>
            <td>
               <button type="button" onclick='rem_facilities($row[sr_no])' class="btn btn-danger btn-sm shadow-none"><i class="bi bi-trash3"></i></button>
            </td>
         </tr>
      data;
   $i++;
   }
}
  
if (isset($_POST['rem_facilities'])) {
   $frm_data = filtration($_POST);
   $value = [$frm_data['rem_facilities']];
   $pre_Q = " SELECT * FROM `facilities` WHERE `sr_no` = ?";
   $res = select($pre_Q, $value,'i');
   $img = mysqli_fetch_assoc($res);
   if (deleteImage($img['db_icon'],FACILITIES_US)) {
      $q = "DELETE FROM `facilities` WHERE `sr_no`=?";
      $res = delete($q,$value,'i');
      echo $res;
   }else{ echo 0;}
}
 

















