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
  <title>Admin Pannel - Carousel</title>
  <?php require_once './inc/link.php' ?>
</head>

<body class="bg-light">
  <?php require_once("inc/header.php"); ?>


  <div class="col-lg-10 ms-auto p-4 overflow-hidden">
    <div class="container-fluid" id="main-content">
      <div class="row">
        <h3 class="mb-4">Carousel</h3>

        <!-- Carousel section -->

        <div class="card rounded shadow-sm mb-4">
            <div class="card-body">

                <div class="d-flex align-item-center justify-content-between">
                  <h5 class="card-title m-0">Images</h5>
                  <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#carousel_s">
                  <i class="bi bi-file-earmark-plus"></i>
                  </button>
                </div>
            
              <div class="row" id = "carousel_data">
              </div>


            </div>
        </div>

        <!--Carousel form modal  -->

        <div class="modal fade" id="carousel_s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form class="carousel_s_form">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center"> Add Image </h5>
                  <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label fw-bold">Picture</label>
                    <!-- accept is a image  validation  attribute in Html -->
                    <input type="file" name="carousel_picture" id="carousel_picture_inp" accept=".jpg, .png, .jpeg" class="form-control shadow-none" required>
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="member_name.value='',carousel_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
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
  <script src="script/carousel.js"></script>
</body>

</html>