<?php
require_once './inc/essential.php';
require_once './inc/config.php';
adminLogin();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Features & Facilities </title>
  <?php require_once './inc/link.php' ?>
</head>

<body class="bg-light">
  <?php require_once("inc/header.php"); ?>


  <div class="col-lg-10 ms-auto p-4 overflow-hidden">
    <div class="container-fluid" id="main-content">
      <div class="row">
        <h3 class="mb-4">Features</h3>

        <div class="card rounded shadow-sm mb-4">
          <div class="card-body">

              <div class="d-flex align-item-center justify-content-between my-2">
                  <h5 class="card-title m-0">Features</h5>
                  <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#features_s">
                  <i class="bi bi-building-add"></i>
                  </button>
                </div>

                <div class="table-responsive-md " style="height:400px; overflow-y:scroll;">
                  <table class="table table-hover">
                      <thead>
                        <tr class='bg-info text-light'>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="features_data">
                      </tbody>
                    </table>
                    </table>
                </div>
                
              <!--Features  modal  -->

              <div class="modal fade" id="features_s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form class="features_s_form">
                      <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center"> Add Features </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-4">
                          <label class="form-label fw-bold">Name</label>
                          <input type="text" name="features_name"  class="form-control shadow-none" required>
                        </div>
                        <div class="modal-footer">
                          <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn custom-bg text-green shadow-none">Submit</button>

                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              </div>
      </div>
      
        <!-- Facilities section -->

        <div class="card rounded shadow-sm mb-4">
              <div class="card-body">
                  <div class="d-flex align-item-center justify-content-between my-2">
                    <h5 class="card-title m-0">Facilities</h5>
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#facilities_s">
                    <i class="bi bi-building-add"></i>
                    </button>
                  </div>
                
                  <div class="table-responsive-md " style="height:400px; overflow-y:scroll;">
                      <table class="table table-hover">
                          <thead class="sticky">
                            <tr class="bg-dark text-light">
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Icon</th>
                              <th scope="col">Description</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody id="facilities_data">
                          </tbody>
                        </table>
                        </table>
                  </div>

              </div>
          </div>
        <!--Facilities modal  -->

        <div class="modal fade" id="facilities_s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <form class="facilities_s_form">
                  <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"> Add Facilities </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">

                      <div class="mb-4">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="facilities_name" class="form-control shadow-none" required>
                      </div>
                      
                      <div class="mb-3">
                        <label class="form-label fw-bold">Icon</label>
                        <input type="file" name="facilities_icon" accept=".svg" class="form-control shadow-none" required>
                      </div>
                      
                      <div class="col-md-12 ps-0 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="facilities_desc" id="" cols="0" rows="3" class="form-control shadow-none"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-green shadow-none">Submit</button>
                      </div>

                  </div>

              </form>

            </div>
          </div>
        </div>

    </div>
  </div>
  <?php require_once './inc/script.php' ?>

<script src="./script/features_facilities.js"></script>
</body>

</html>