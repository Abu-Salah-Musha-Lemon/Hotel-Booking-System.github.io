<?php 
require_once ('./admin/inc/config.php');
require_once ('./admin/inc/essential.php');
session_start();
// this section use all the page load contact details.
$contact_q = "SELECT * FROM `contact_details` WHERE `sr_no` = ?";
$setting_q = "SELECT * FROM `setting` WHERE `sr_no` = ?";
$contact_value = [2];
$value = [1];
$contact_r =mysqli_fetch_assoc( select($contact_q, $contact_value,'i'));

$setting_r =mysqli_fetch_assoc( select($setting_q,$value,'i'));

if($setting_r['shutdown_db'])
{
	echo <<< alert
				<div class="alert alert-warning text-center text-dark fw-bolder" role="alert">
				<i class="bi bi-exclamation-triangle text-danger fs-5 "></i>
				Booking are temporarily closed!!
				</div>
	alert;
}


?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Merienda:wght@300;400;500;700;800;900&family=Poppins:ital,wght@0,200;0,400;0,500;0,700;0,800;1,300&display=swap"
  rel="stylesheet">
<link rel="stylesheet" href="./bootstrap5.3.2.min.css">
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />