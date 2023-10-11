<?php
function adminLogin(){
  session_start();
  if (!(($_SESSION['adminLogin'])&& $_SESSION['adminId']==true)) { 
    echo"
    <script>window.location.href='index.php';</script>";
  }
  session_regenerate_id(); // creat new sesson 
}

function redirect($url){
  echo"
   <script>window.location.href='$url';</script>";
}
function alert($type, $msg){
  $bs_class = ($type == 'success')? "alert-success":"alert-danger";
  echo <<<alert
        <div class="alert $bs_class alert-dismissible fade show" role="alert">
        <strong>$msg</strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    alert;
}
?>