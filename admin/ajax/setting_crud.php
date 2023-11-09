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


if (isset($_POST['get_contacts'])) {
    $query = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $value = [2];
    $res = select($query, $value, 'i');
    $data = mysqli_fetch_assoc($res);
    echo json_encode($data);
}
// var_dump($_POST);



if (isset($_POST['upd_contacts'])) {

  $frm_data = filteration($_POST);
  $query = "UPDATE `contact_details` SET `address_db`=?, `gmap_db`=?, `pn1_db`=?, `pn2_db`=?, `email_db`=?, `fb_db`=?, `insta_db`=?, `tw_db`=?, `iframe_db`=? WHERE `sr_no`=?";
  $values = [$frm_data['address'], $frm_data['gmap'], $frm_data['pn1'], $frm_data['pn2'], $frm_data['email'], $frm_data['fb'], $frm_data['insta'], $frm_data['tw'], $frm_data['iframe'], 2]; // 2 is sr_no of the data base and sr_no in the data base is 2nd row.

  $res = update($query, $values, 'sssssssssi');
  print_r($res);
  // if ($res === false) {
  //   die("Database error: " . mysqli_error($your_db_connection));
  // } else {
  //   echo "Data updated successfully.";
  // }
}

if (isset($_POST['add_member'])) {
  $frm_data = filteration($_POST);
   $img_re = uploadImage($_FILES['image'],ABOUT_US);

   if ($img_re == 'inv_img') {
    return $img_re;
   }
   else if($img_re == 'inv_size'){
    return   $img_re;
   }
   else if($ima_re == 'upd_failed'){
    return $ima_re;
   }
   else{
    $q = "INSERT INTO `team_details`( `tm_name_db`, `tm_picture_db`) VALUES (?,?)";
    $value = [$frm_data['name'],$img_re];
    print_r($value);
    $res = insert($q,$value,'ss') or die($res);
    echo $res;
    var_dump($res);

   }
}



















