<?php
require_once 'ess.php';

if (isset($_POST['add_member'])) {
   $frm_data = filtration($_POST); // Assuming filtration function is defined

   $img_re = uploadImage($_FILES['picture'], ABOUT_US);

   if ($img_re == 'inv_img') {
      echo $img_re;
   } else if ($img_re == 'inv_size') {
      echo $img_re;
   } else if ($img_re == 'upd_failed') {
      echo $img_re;
   } else {
      $q = "INSERT INTO `team_details`( `tm_name_db`, `tm_picture_db`) VALUES (?,?)";
      $value = [$frm_data['name'], $img_re];
      $res = insert($q, $value, 'ss');

      // Assuming insert function handles the database interaction
      if ($res) {
         echo json_encode(['status' => 'success', 'message' => 'Upload successful']);
      } else {
         echo json_encode(['status' => 'error', 'message' => 'Failed to upload']);
      }
   }
}
?>
