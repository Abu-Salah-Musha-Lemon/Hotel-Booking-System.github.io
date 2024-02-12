<?php
$con = mysqli_connect('localhost','root','','test2') or die('connection failed');
// print_r($con);
session_start();
if (isset($_POST['logIn'])) {
  //  $name = mysqli_real_escape_string($con,$_POST['name']);
   $email = mysqli_real_escape_string($con,$_POST['email']);
   $password = mysqli_real_escape_string($con,$_POST['password']);
  //  $password =$_POST['password'];

   $query = "SELECT `email`, `password` FROM `login` WHERE `email`='{$email}'  OR  `password`='{$password}'";
  //  echo $query;
   $result = mysqli_query($con,$query) or die(mysqli_error($con));

   if ($result) {
      if (mysqli_num_rows($result)==1) {
        $result_fetch = mysqli_fetch_assoc($result);
        if (password_verify($password,$result_fetch['password'])) {
          $_SESSION['login']= true;
          $_SESSION['userName']= $result_fetch['name'];
          header('location:index.php');
        }
      }
   } else {
      echo 'Error: ' . mysqli_error($con);
   }
}


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Login system with verification </title>
</head>

<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Login</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li> </ul>
        <?php
        if (isset($_SESSION['logIn']) && $_SESSION['logIn']== true) {
          echo <<< data
              <div class="btn-group">
              <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                $_SESSION[userName]
              </button>
              <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><button class="dropdown-item" type="button">Action</button></li>
                <li><button class="dropdown-item" type="button">Another action</button></li>
                <li><button class="dropdown-item" type="button">Something else here</button></li>
              </ul>
            </div>
          data;
          
        }else{
          echo <<< data
            <li class="nav-item">
                      <a class="nav-link btn btn-outline-danger" href="logout.php">logout</a>
              </li>
          data;
        }

        ?>
         
          
        </div>
      </div>
    </nav>
  </div>
  <div class="container-fluid">
    <div class="card mt-4" style="width: 20rem; margin: 0 auto;">

      <div class="card-body">
        <h5 class="card-title">Login </h5>

        <form method='post'>
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name= 'email' class="form-control shadow-sm" >
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name= 'password' class="form-control shadow-sm" >
          </div>

          <button type="submit" name="logIn" class="btn btn-primary shadow-sm">Submit</button>
        </form>


      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

</body>

</html>