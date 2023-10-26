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
 $frm_data = ($_POST['upd_shutdown']==0) ? 1:0;
 $query = "UPDATE `setting` SET `shutdown_db`=? WHERE `sr_no`=?";
 $values = [$frm_data,1]; 
 $res = update($query,$values,'ii');
  echo $res;
}
