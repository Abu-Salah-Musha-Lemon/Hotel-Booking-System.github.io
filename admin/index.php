<?php
include_once './inc/config.php';
include_once './inc/essential.php';
session_start();

if (isset($_SESSION['adminLogin'])&& $_SESSION['adminLogin']==true) { 
 redirect('dashboard.php');
}
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
          <input type="text" name="admin_name" id="" class="form-control shadow-none ">
        </div>
        <div class="mb-4">
          <input type="password" name="admin_pass" id="" class="form-control shadow-none ">
        </div>
        <button type="submit" class="btn  custom-bg shadow-none" name="login">Log in</button>
      </div>
    </form>
  </div>
<?php 
if(isset($_POST['login'])){
  $frm_data = filteration($_POST);
  
  $query = "SELECT * FROM `admin` WHERE `admin_name`=? AND `admin_pass`=? ";
  $value = [$frm_data['admin_name'], $frm_data['admin_pass']];
  $datatypes='ss';
  $res = select($query, $value,$datatypes);
  if($res-> num_rows==1){
    $row = mysqli_fetch_assoc($res);
    $_SESSION['adminLogin']= true;
    $_SESSION['adminId']=$row['sr_no'];
    redirect('dashboard.php');
  }else{
    alert('error','loin failed -Invalid Credentials');
  }
}
 


?>


  <?php require_once "./inc/script.php"?>
</body>

</html>