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













?>