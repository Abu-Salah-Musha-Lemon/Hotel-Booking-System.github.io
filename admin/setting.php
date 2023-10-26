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

        <div class="card rounded shadow-sm mb-4">
          <div class="card-body">
            <div class="d-flex align-item-center justify-content-between">
              <h5 class="card-title m-0">General Setting</h5>
              <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#genertal_s">
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
              <form class="general_s_form">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center">General Setting</h5>
                  <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-4">
                    <label class="form-label fw-bold">Site Title</label>
                    <input type="text" name="site_title_inp" id="site_title_inp" class="form-control shadow-none">
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold">About</label>
                    <textarea name="" name="site_about_inp" id="site_about_inp" cols="0" rows="1" class="form-control shadow-none"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" onclick="site_title_inp.value = general_data.site_title_db, site_about_inp.value= general_data.site_about_db" class="btn text-secoundary shadow-none" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn custom-bg text-green shadow-none">Submit</button>

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- shutdown section -->
        <div class="card rounded shadow-sm mb-4">
          <div class="card-body">
            <div class="d-flex align-item-center justify-content-between">
              <h5 class="card-title m-0">Shutdown Setting</h5>
              <div class="form-check form-switch">
                <form>
                  <input onchange=upd_shutdown(this.value) class="form-check-input" type="checkbox" id="shutdown_toggle">

                </form>
              </div>
            </div>
            <p class="card-text">No customer will be allowed to book hotel room, when shutdown </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once './inc/script.php' ?>

  <script>
      let general_data;
      let general_s_form = document.getElementsByClassName('general_s_form')
      let site_title_inp = document.getElementById('site_title_inp');
      let site_about_inp = document.getElementById('site_about_inp');
    function get_general() {
      let site_title = document.getElementById('site_title');
      let site_about = document.getElementById('site_about');
      let site_shutdown_toggle = document.getElementById('shutdown_toggle');
      let xhr = new XMLHttpRequest();

      xhr.open('POST', "ajax/setting_crud.php", true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onload = function() {
        general_data = JSON.parse(this.responseText);
        site_title.innerText = general_data.site_title_db;
        site_about.innerText = general_data.site_about_db;

        site_title_inp.value = general_data.site_title_db;
        site_about_inp.value = general_data.site_about_db;

        if (general_data.shutdown_db == 0) {
          site_shutdown_toggle.checked = false;
          site_shutdown_toggle.value = 0;
        } else {
          site_shutdown_toggle.checked = true;
          site_shutdown_toggle.value = 1;
        }
      }
      xhr.send('get_general')
    }

    general_s_form.addEventListener('submit',function(e){
      e.preventDefault()
      upd_general(site_title_inp.value, site_about_inp.value)
    })


    function upd_general(site_title_inp_val, site_about_inp_val) {
      let xhr = new XMLHttpRequest();

      xhr.open('POST', "ajax/setting_crud.php", true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
      let myModal = document.getElementById('genertal_s')
      let modal = bootstrap.Modal.getInstance(myModal)
      modal.hide()
      if (this.responseText == 1) {
        alert('success', 'changes save!')
        get_general()
      } else {
        alert('error', 'No changes made!')
      }
      xhr.onload = function() {
        console.log(this.responseText);
      }

      xhr.send('site_title_inp=' + site_title_inp_val + '&site_about_inp=' + site_about_inp_val + '&upd_general')
    }

    function upd_shutdown(val) {
      let xhr = new XMLHttpRequest();

      xhr.open('POST', "ajax/setting_crud.php", true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onload = function() {
        if (this.responseText == 1&& general_data.shutdown_db ==0) {
        alert('success', ' Site has been  Shutdown!')
      } else {
        alert('Success', 'Shutdown off successfully !')
      }
      get_general()
        
      }

      xhr.send('upd_shutdown='+val)
    }
    window.onload = function() {
      get_general()
    }
  </script>
</body>

</html>