<?php
$con = mysqli_connect('localhost','root','','test2') or die('connection failed');

if (isset($_GET['email'])&& isset($_GET['is_verify'])) {
  $query = "SELECT * FROM `login` WHERE `email`= '{$_GET['email']}' AND `is_verify`= '{$_GET['is_verify']}'";
  $result = mysqli_query($con,$query);


if (mysqli_num_rows($result)==1) {
  $result_fetch = mysqli_fetch_assoc($result);
  if ($result_fetch['v_code']==0) {
    $update = "UPDATE `login` SET`v_code`='1' WHERE  `email`= '{$result_fetch['email']}'";
    $res = mysqli_query($con, $update);
    echo <<<data
            <script>alert('Registration Successfully')
            window.location.href='index.php'
            </script>
          data;
  }else{
    echo <<<data
            <script>alert('server down')</script>
          data;
  }
}
}




?>