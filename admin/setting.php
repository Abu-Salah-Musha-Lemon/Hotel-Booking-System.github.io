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
  <title>Admin Pannel - setting</title>
  <?php require_once './inc/link.php' ?>
</head>

<body class="bg-light">
  <?php require_once("inc/header.php"); ?>


  <div class="col-lg-10 ms-auto p-4 overflow-hidden">
    <div class="container-fluit" id="main-content">
      <div class="row">
        <h3 class="mb-4">SETTING</h3>

        <!-- General Setting section -->

        <div class="card">
          <div class="card-body">
            <div class="d-flex align-item-center justify-content-between">
              <h5 class="card-title m-0">General Setting</h5>
              <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal"
						data-bs-target="#genertal_s">
						<i class="bi bi-pencil-square"></i>Edit
					</button>
            </div>
              <h6 class="card-subtitle mb-1 fw-bold">Site Title </h6>
              <p class="card-text" id="site_title"></p>
              <h6 class="card-subtitle mb-1 fw-bold">About </h6>
              <p class="card-text" id="site_about"></p>
          </div>
        </div>

              <div class="modal fade" id="genertal_s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="#">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center">General Setting</h5>
                  <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-4">
                    <label class="form-label">Site Title</label>
                    <input type="email" name="site_title_inp" class="form-control shadow-none">
                  </div>
                  <div class="mb-3">
                      <label class="form-label">About</label>
                      <textarea name="" name="stie_about_inp" id="" cols="0" rows="1" class="form-control shadow-none"></textarea>
                    </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn text-secoundary shadow-none"data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn custom-bg text-green shadow-none">Submit</button>
              
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  



  <?php require_once './inc/script.php' ?>

  <script>
    let general_data;
    function get_general(){
      let site_title= document.getElementById('stie_title') ;
      let site_about= document.getElementById('stie_about') ;
      let site_title_inp= document.getElementById('stie_title_inp') ;
      let site_about_inp= document.getElementById('stie_about_inp') ;
      let xhr = new XMLHttpRequest();
      xhr.open('POST',"ajax/setting_crud.php", true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onload = function(){
        general_data =JSON.parse(this.responseText);
        site_title.innerText = general_data.site_title;
        site_title.innerText= general_data.site_about;
        console.log(general_data)
      }

      xhr.send('get_general')
    }

    window.onload = function(){
      get_general()
    }
  </script>
</body>

</html>