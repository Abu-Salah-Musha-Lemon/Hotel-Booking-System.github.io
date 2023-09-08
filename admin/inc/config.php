<?php
$host = 'localhost';
$user ='root';
$pass = '';
$db_name = 'hotelBooking';
$con = mysqli_connect($host,$user,$pass,$db_name);

if (!$con) {
  die('connection Faild'. mysqli_connect_errno());
}