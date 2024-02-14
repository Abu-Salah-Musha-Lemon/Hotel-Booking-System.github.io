<?php
$con = mysqli_connect('localhost','root','','test2') or die('connection failed');
// print_r($con);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($con,$_POST['name']);
   $email = mysqli_real_escape_string($con,$_POST['email']);
   $password = mysqli_real_escape_string($con,$_POST['password']);
   $v_code = bin2hex(random_bytes(16));
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
        $insert = "INSERT INTO `login`( `name`, `email`, `password`,`is_verify`, `v_code`) VALUES ('{$name}', '{$email}','{$password}','{$v_code}','0')";
        if (mysqli_query($con,$insert)&& mailSender($_POST['email'],$v_code)) {
          echo <<<data
            <script>alert('Registration Successfully')</script>
          data;
        }else {
          echo <<<data
            <script>alert('server Down ')</script>
          data;
        }
       }
     }
   } else {
      echo 'Error: ' . mysqli_error($con);
   }
}

function mailSender($email,$v_code)
{
  require './PHPMailer/Exception.php';
  require './PHPMailer/PHPMailer.php';
  require './PHPMailer/SMTP.php';
  $em = 'abusalahmusha512@gmail.com';
  // $pass = 'jpylugacdgatmrzf';
  $pass ='ktcw tayb ndbz swmt';

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {

    $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'localhost';                     //Set the SMTP server to send through
    // $mail->Host       = 'smtp.google.com';                     //Set the SMTP server to send through
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'abusalahmusha512@gmail.com';                     //SMTP username
    $mail->Password   = 'ktcwtaybndbzswmt';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('abusalahmusha512@gmail.com', 'ASMLab');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email verification for ASMLab';
    $mail->Body    = "
      click the link below to verify the email address 
      <a href='http://localhost/Hotel-Booking/Hotel-Booking-System.io/loginsystem/verify.php?email=$email&is_verify=$v_code'>veryfy</a>
    ";


    $mail->send();
    // echo 'Message has been sent';
    echo true;
  } catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo false;
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