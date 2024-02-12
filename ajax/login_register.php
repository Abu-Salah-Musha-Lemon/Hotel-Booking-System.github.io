<?php

include_once './admin/inc/config.php';
include_once './admin/inc/essential.php';
include('./smtp/PHPMailerAutoload.php');


if (isset($_POST['recitation'])) {
  $data = filtration($_POST);


  // password and confirm password is masse 
if ($data['password']!=$data['cpassword']) {
  echo 'pass_mismatch';
  exit;
}

// check user exists or not 
 
$u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? AND `phone`=? LIMIT 1",[$data['email'],$data['phone']],'ss');

if (mysqli_fetch_assoc($u_exist)!=0) {
  $u_exist_fetch = mysqli_fetch_assoc($u_exist);
  echo ($u_exist_fetch['email'] == $data['email']) ? 'email already exist' : 'phone number already exist'
  
}


// upload user image
//wwnl zspu bwox vdfc
$img =  uploadUserImage($_FILES['profile']);
if ($img =='inv_img' ) {
  echo 'inv_img';
  exit;
}else if ($img == 'upd_failed'){
  echo 'upd_failed';
  exit;
}

 $token = bin2hex(random_bytes(16));

 if(!smtp_mailer($email['email'],$data['name'],$token)){
	echo "mail_failed";
	exit;
 }
 $enc_pass = password_hash($data['pass'],PASSWORD_BCRYPT);
 $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phone`, `pincode`, `dob`, `profile`, `password`,  `token`) VALUES (?,?,?,?,?,?,?,?,?)";
 $value =[$data['name'],$data['email'],$data['address'],$data['phone'],$data['pincode'],$data['dob'],$img,$enc_pass,$data['token'],] ;
 if (insert($query,$value,'sssssssss')) {
		echo 1;
 }else {
	echo 'inv_failed';
 }


 }

// $from = "abusalahmusha512@gmail.com";
// $pass = "wwnlzspubwoxvdfc";


// // echo smtp_mailer($receiverEmail,$subject,$emailbody.$otp);

// function smtp_mailer($email,$data, $token){
// 	$mail = new PHPMailer(); 
// 	$mail->IsSMTP(); 
// 	$mail->SMTPAuth = true; 
// 	$mail->SMTPSecure = 'tls'; 
// 	$mail->Host = "smtp.gmail.com";
// 	$mail->Port = 587; 
// 	$mail->IsHTML(true);
// 	$mail->CharSet = 'UTF-8';
// 	//$mail->SMTPDebug = 2; 
// 	$mail->Username = "abusalahmusha512@gmail.com"; //write sender email address
// 	$mail->Password = "wwnlzspubwoxvdfc"; //write app password of sender email
// 	$mail->SetFrom($from); //write sender email address
// 	$mail->Subject = $subject;
// 	$mail->Body =$msg;
// 	$mail->AddAddress($email);
// 	$mail->SMTPOptions=array('ssl'=>array(
// 		'verify_peer'=>false,
// 		'verify_peer_name'=>false,
// 		'allow_self_signed'=>false
// 	));
// 	if(!$mail->Send()){
// 		echo $mail->ErrorInfo;
// 	}else{
// 		echo "
// 		Click the link to confirm your email:<br>
// 		<a href='".SITE_URL."email.confirm.php?email=$email&token=$token"."'></a>.$data ";
// 	}
// }














?>