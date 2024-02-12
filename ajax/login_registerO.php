<?php

include_once '../admin/inc/config.php';
include_once '../admin/inc/essential.php';
include '../smtp/PHPMailerAutoload.php';



if (isset($_POST['register_form'])) {
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $phone = mysqli_real_escape_string($con,$_POST['phone']);
  $address = mysqli_real_escape_string($con,$_POST['address']);
  $pincode = mysqli_real_escape_string($con,$_POST['pincode']);
  $data = mysqli_real_escape_string($con,$_POST['data']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
  $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

  if ($name ==''|| $email==''||$phone==''|| $address==''|| $data==''|| $password=='') {
    $res = [
      'status'=>500,
      'message'=>'All the field is required'
    ];
  }

  else {
    $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phone`, `pincode`, `dob`, `password`) VALUES (
      '{$name}', '{$email}', '{$address}', '{$phone}', '{$pincode}', '{$data}', '{$password}')";


    $result = mysqli_query($con,$query);
    if ($result) {
      $res=[
        'status'=>200,
        'message'=>'Register  Successfully'
      ];
      echo json_encode($res);
      return false;
    } else {
      $res=[
        'status'=>500,
        'message'=>'Register Failed'
      ];
      echo json_encode($res);
      return false;
    }
  }

}
// // login
if (isset($_POST['login'])) {
  $data = filtration($_POST);
  $u_exist = select('SELECT * FROM `user_cred` WHERE `email`=? AND `password`=? LIKE 1', [$data['email_mob'], $data['password']], 'ss');

  if (mysqli_num_rows($u_exist) == 0) {
    echo 'inv_email_mob';
  } else {
    $u_fetch = mysqli_fetch_assoc($u_exist);
    echo $u_fetch or die();
    if ($u_fetch['status'] == 0) {
      echo 'inactive';
    } else if (
      !password_verify($data['password'], $u_fetch['password'])) {
        echo 'invalid_pass';
      } 
      else {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['uId'] = $u_fetch['sr_no'];
        $_SESSION['uName'] = $u_fetch['name'];
        $_SESSION['uPhone'] = $u_fetch['phone'];
        echo 1;
      }
    }
  }


// if (isset($_POST['login'])) {
//     $data = filtration($_POST);
//     $u_exist = select('SELECT * FROM `user_cred` WHERE `email`=? AND `phone`=?', [$data['email_mob'], $data['email_mob']], 'ss');
//     // $result = mysqli_num_rows($u_exist)
//     if (mysqli_num_rows($u_exist) == 0) {
//         echo 'inv_email_mob';
//     } else if(mysqli_fetch_assoc($u_exist)){
//         $u_fetch = mysqli_fetch_assoc($u_exist);
//         if( $u_fetch['status']==1){
//           if (!password_verify($data['password'], $u_fetch['password'])) {
//             echo 'invalid_pass';
//         } else{
//           session_start();
//             $_SESSION['login'] = true;
//             $_SESSION['uId'] = $u_fetch['sr_no'];
//             $_SESSION['uName'] = $u_fetch['name'];
//             $_SESSION['uPhone'] = $u_fetch['phone'];
//             echo 1;
//         }
//       } else ($u_fetch['status'] == 0) {
//         echo 'inactive';
//     } 
       
//     }
// }





?>