<?php 
require_once './inc/essential.php';
adminLogin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Pannel - Dashboard</title>
  <?php require_once './inc/link.php'?>
</head>
<body class="bg-light">
  <div class="container-fluid bg-dark text-light p-3 d-flex align-item-center justify-content-between" >
    <h3 class="mb-0">Admin Panel</h3>
    <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
  </div>
   <?php require_once './inc/script.php'?>
</body>
</html>