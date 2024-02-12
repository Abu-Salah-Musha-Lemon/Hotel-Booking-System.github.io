<?php
 $con = mysqli_connect('localhost','root','','test2') or die('connection failed');
 session_start();
 session_destroy();
 header('location: index.php');
?>