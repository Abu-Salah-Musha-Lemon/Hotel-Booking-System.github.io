<?php
require_once 'ess.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Pannel - setting</title>
  <?php require_once '../inc/link.php' ?>
</head>

<body class="bg-light">
  <?php require_once("../inc/header.php"); ?>


  <div class="col-lg-10 ms-auto p-4 overflow-hidden">
    <div class="container-fluit" id="main-content">
      <div class="row">
        <!-- MANAGEMENT TEAMS Setting section -->

        <div class="card rounded shadow-sm mb-4">
            <div class="card-body">
                <div class="d-flex align-item-center justify-content-between">
                  <h5 class="card-title m-0">Management Team</h5>
                  <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3 bg-success" data-bs-toggle="modal" data-bs-target="#teams_s">
                  <i class="bi bi-person-fill-add "></i>
                  </button>
                </div>
              <h6 class="card-subtitle mb-1 fw-bold">Picture </h6>
            </div>
        </div>

        <!--members form modal  -->

        <div class="modal fade" id="teams_s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form class="teams_s_form">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center"> Add Team Member </h5>
                  <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-4">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="member_name" id="member_name_inp" class="form-control shadow-none" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold">Picture</label>
                    <!-- accept is a image  validation  attribute in Html -->
                    <input type="file" name="member_picture" id="member_picture_inp" accept=".jpg, .png, .jpeg" class="form-control shadow-none" required>
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn custom-bg text-green shadow-none">Submit</button>

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php //echo $_SERVER['DOCUMENT_ROOT'];?>

      </div>
    </div>
  </div>
  <?php require_once '../admin/inc/script.php' ?>

  <script>
      let teams_s_from = document.querySelector(".teams_s_form");
      let member_name_inp= document.getElementById("member_name_inp")
      let member_picture_inp= document.getElementById("member_picture_inp")
    // members 
    teams_s_from.addEventListener('submit',function(e){
      e.preventDefault()
      add_member()
    })


    function add_member() {
   let data = new FormData();
   console.log(member_name_inp.value); // Log input values to check if they are present
   console.log(member_picture_inp.files[0]);
   data.append('name', member_name_inp.value);
   data.append('picture', member_picture_inp.files[0]);
   data.append('add_member', '');

   let xhr = new XMLHttpRequest();
   xhr.open('POST', "crud.php", true);
   xhr.onload = function () {
      console.log(this.responseText);
                  // module hidden  
            let myModal = document.getElementById('teams_s')
            let modal = bootstrap.Modal.getInstance(myModal)
            modal.hide()
              // console.log(this.responseText);
                if (this.responseText == 'inv_size' ) {
                alert('error', 'The image is larger the 2MB!')
              }else if(this.responseText == 'inv_img'){
                alert('error', 'The image is formate invalid !')
              }else if(this.responseText == 'upd_failed'){
                alert('error','failed to upload')}
              else{alert('success', 'upload successfully !') }
   }
   xhr.send(data);
}

    window.onload = function() {

    }

  </script>
</body>

</html>