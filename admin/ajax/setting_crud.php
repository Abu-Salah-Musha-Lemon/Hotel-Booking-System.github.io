<?php
require_once '../inc/config.php';
require_once '../inc/essential.php';
adminLogin();

if (isset($_POST['get_general'])) {
  $query = "SELECT *From `setting`WHERE `sr_no`= ?";
  $value =[1];
  $res = select($query,$value, 'i');
  $data = mysqli_fetch_assoc($res);
  $json_data= json_encode($data);
  echo $json_data;
}

if (isset($_POST['upd_general'])) {
 $frm_data = filteration($_POST);
 $query = "UPDATE `setting` SET `site_title_db`=?,`site_about_db`=? WHERE `sr_no`=?";
 $values = [$frm_data['site_title_inp'],$frm_data['site_about_inp'],1]; 
 $res = update($query,$values,'ssi');
  echo $res;
}

if (isset($_POST['upd_shutdown'])) {
 $frm_data = ($_POST['upd_shutdown']==0) ?1:0;
 $query = "UPDATE `setting` SET `shutdown_db`=? WHERE `sr_no`=?";
 $values = [$frm_data,1]; 
 $res = update($query,$values,'ii');
  echo $res;
}



// if (isset($_POST['get_contacts'])) {
//   $query = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
//   $value =[2];
//   $res = select($query,$value, 'i');
//   $data = mysqli_fetch_assoc($res);
//   $json_data= json_encode($data);
//   echo $json_data;
// }

if (isset($_POST['get_contacts'])) {
    $query = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $value = [2];
    $res = select($query, $value, 'i');
    $data = mysqli_fetch_assoc($res);
    echo json_encode($data);
}


if (isset($_POST['upd_contacts'])) {
  $frm_data = filteration($_POST);
  echo $frm_data ;
  $query = "UPDATE `contact_details` SET`address_db`=?,`gmap_db`=?,`pn1_db`=?,`pn2_db`=?,`email_db`=?,`fb_db`=?,`insta_db`=?,`tw_db`=?,`iframe_db`=? WHERE `sr_no`=?";
  $values = [$frm_data['address_inp'],$frm_data['gmap_inp'],$frm_data['pn1_inp'],$frm_data['pn2_inp'],$frm_data['email_inp'],$frm_data['fb_inp'],$frm_data['insta_inp'],$frm_data['tw_inp'],$frm_data['iframe_inp'],1]; 
  $res = update($query,$values,'ssssssssi');
   echo $res;
 }




















