<?php
$con = mysqli_connect('localhost','root','','test2') or die('connection failed');
// print_r($con);
if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($con,$_POST['name']);
   $email = mysqli_real_escape_string($con,$_POST['email']);
   $password = mysqli_real_escape_string($con,$_POST['password']);
  //  $password =$_POST['password'];

  $query = "SELECT * FROM`login`";
  //  echo $query;
   $result = mysqli_query($con,$query) or die(mysqli_error($con));

   if ($result) {
     if (mysqli_num_rows($result)>0) {
       $result_fetch = mysqli_fetch_assoc($result);
       if ($name == $result_fetch['name']||$email ==$result_fetch['email']) {
        echo<<<alert
                <div class="alert alert-warning alert-danger fade show" role="alert" style="width:250px;">
                  Name and Email already exist.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              alert; 
       }else if(empty($name)||empty($email)){
        echo<<<alert
                  <div class="alert alert-warning alert-danger fade show" role="alert" style="width:250px; ">
                  Enter Email and Password.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            alert;
       }else{
        $insert = "INSERT INTO `login`( `name`, `email`, `password`) VALUES ('{$name}', '{$email}','{$password}')";
        $re2 = mysqli_query($con,$insert);
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
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">LogIn</a>
            </li>
          </ul>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-danger" href="logout.php">logout</a>
          </li>
        </div>
      </div>
    </nav>
  </div>
  <div class="container-fluid">
    <div class="card mt-4" style="width: 20rem; margin: 0 auto;">

      <div class="card-body">
        <h5 class="card-title">Register  </h5>

        <form method="post">
          <div class="mb-3">
            <label class="form-label">Name </label>
            <input type="text" name= 'name' class="form-control shadow-sm" >
          </div>
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name= 'email' class="form-control shadow-sm" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name= 'password' class="form-control shadow-sm" required>
          </div>

          <button type="submit" name = "submit" class="btn btn-primary shadow-sm">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

</body>

</html>