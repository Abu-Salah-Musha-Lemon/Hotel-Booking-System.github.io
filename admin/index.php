<?php
include_once './inc/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LogIn </title>
  <?php include_once "./inc/link.php"?>
  <link rel="stylesheet" href="./css/style.css">
</head>
<style>
  .login_form{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 400px;
  }
</style>
<body class="bg-light">
  <div class="login_form text-center rounded bg-white">
    <form action="" method="post">
      <h4 class="bg-dark text-white py-2">ADMIN LOG IN </h4>
      <div class="p-4">
        <div class="mb-4">
          <input type="text" name="" id="" class="form-control shadow-none ">
        </div>
        <div class="mb-4">
          <input type="password" name="" id="" class="form-control shadow-none ">
        </div>
        <button type="submit" class="btn  custom-bg shadow-none">Log in</button>
      </div>
    </form>
  </div>
</body>

</html>