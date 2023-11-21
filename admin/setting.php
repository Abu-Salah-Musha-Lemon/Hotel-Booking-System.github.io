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
              <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#general_s">
                <i class="bi bi-pencil-square"></i>Edit
              </button>
            </div>
            <h6 class="card-subtitle mb-1 fw-bold">Site Title </h6>
            <p class="card-text" id="site_title"></p>
            <h6 class="card-subtitle mb-1 fw-bold">About </h6>
            <p class="card-text" id="site_about"></p>
          </div>
        </div>
        
        <!--General form modal  -->

        <div class="modal fade" id="general_s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                    <input type="text" name="site_title_inp" id="site_title_inp" class="form-control shadow-none" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold">About</label>
                    <textarea name="" name="site_about_inp" id="site_about_inp" cols="0" rows="1" class="form-control shadow-none" required></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="site_title_inp.value = general_data.site_title_db, site_about_inp.value= general_data.site_about_db" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
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

        <!-- contract details setting -->

        <div class="card rounded shadow-sm mb-4">
          <div class="card-body">
            <div class="d-flex align-item-center justify-content-between">
              <h5 class="card-title m-0">Contract Details</h5>
              <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#contracts_s">
                <i class="bi bi-pencil-square"></i> Edit
              </button>
            </div>
            <div class="row">
              <div class="col-lg-6">
                  <div class="mb-4">
                    <h6 class="card-subtitle mb-1 fw-bold">Address </h6>
                    <p class="card-text" id="address"></p>
                  </div>

                  <div class="mb-4">
                    <h6 class="card-subtitle mb-1 fw-bold">Google Maps </h6>
                    <p class="card-text" id="gmap"></p>
                  </div>
                
                  <div class="mb-4">
                    <h6 class="card-subtitle mb-1 fw-bold">Phone Number </h6>
                    <p class="card-text">
                    <i class="bi bi-telephone-fill fs-6 text-info"></i>
                    <span id="pn1"></span>
                    </p>

                    <p class="card-text">
                    <i class="bi bi-telephone-fill fs-6 text-info"></i>
                    <span id="pn2"></span>
                    </p>
                  </div>

                  <div class="mb-4">
                    <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                    <p class="card-text" id="email"></p>
                  </div>
              </div>

              <div class="col-lg-6">
        
                  <div class="mb-4">
                    <h6 class="card-subtitle mb-1 fw-bold">Social Link </h6>
                    <p class="card-text">
                    <i class="bi bi-facebook px-2 me-1"></i>
                    <span id="fb"></span>
                    </p>

                    <p class="card-text">
                    <i class="bi bi-twitter px-2 me-1"></i>
                    <span id="insta"></span>
                    </p>

                    <p class="card-text">
                    <i class="bi bi-instagram px-2 me-1"></i>
                    <span id="tw"></span>
                    </p>
                  </div>

                  <div class="mb-4">
                    <h6 class="card-subtitle mb-1 fw-bold">Iframe</h6>
                    <iframe id="iframe" class="border p-2 m-100" loading= "lazy" src="" frameborder="0"></iframe>
                  </div>
              </div>
            </div>

          </div>
        </div>
        <!--Contract form modal  -->

        <div class="modal fade" id="contracts_s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content ">
              <form class="contacts_s_form">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center">Contacts  Setting</h5>
                  <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <div class="container-fluid p-0">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-4">
                          <label class="form-label fw-bold">Address </label>
                          <input type="text" name="address_inp" id="address_inp" class="form-control shadow-none" required>
                        </div>
                        
                        <div class="mb-4">
                          <label class="form-label fw-bold">Google Map </label>
                          <input type="text" name="gmap_inp" id="gmap_inp" class="form-control shadow-none" required>
                        </div>
                        
                        <div class="mb-4">
                          <label class="form-label fw-bold">Phone </label>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i class="bi bi-telephone-fill fs-6 text-info"></i> </span>
                            <input type="number" class="form-control shadow-none" id="pn1_inp" name="pn1_inp"  required>
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i class="bi bi-telephone-fill fs-6 text-info"></i> </span>
                            <input type="number" class="form-control shadow-none" id="pn2_inp" name="pn2_inp" >
                          </div>
                        </div>

                        <div class="mb-4">
                          <label class="form-label fw-bold">Email </label>
                          <input type="text" name="email_inp" id="email_inp" class="form-control shadow-none" required>
                        </div>

                      </div>
                      <div class="col-md-6">
                        <div class="mb-4">
                          <label class="form-label fw-bold">Social link </label>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i class="bi bi-facebook"></i></span>
                            <input type="text" class="form-control shadow-none" id="fb_inp" name="fb_inp"  required>
                          </div>

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i class="bi bi-instagram"></i> </span>
                            <input type="text" class="form-control shadow-none" id="insta_inp" name="insta_inp"  required>
                          </div>
                          <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1"> <i class="bi bi-twitter"></i> </span>
                              <input type="text" class="form-control shadow-none" id="tw_inp" name="tw_inp" >
                            </div>
                        </div>
                        <div class="mb-4">
                          <label class="form-label fw-bold">IFrame </label>
                          <input type="text" name="iframe_inp" id="iframe_inp" class="form-control shadow-none" required>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="submit" onclick=contacts_inp(contacts_data) class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn custom-bg text-green shadow-none">Submit</button>

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- MANAGEMENT TEAMS Setting section -->

        <div class="card rounded shadow-sm mb-4">
            <div class="card-body">
                <div class="d-flex align-item-center justify-content-between">
                  <h5 class="card-title m-0">Management Team</h5>
                  <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#teams_s">
                  <i class="bi bi-file-earmark-plus"></i>
                  </button>
                </div>
              

              <div class="row" id = "team_data">
                  <!-- <div class="col-md-2 mb-3">
                        <div class="card bg-dark text-white text-end ">
                          <img src="../image/admin/IMG_30741.jpg" class="card-img">
                          <div class="card-img-overlay">
                              <button type="button" class="btn btn-danger btn-sm shadow-none"><i class="bi bi-person-dash-fill"></i></button>
                            </div>
                            <p class="card-text text-center px-3 py-2">Random Name</p>
                        </div>
                  </div> -->
              </div>


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
                    <button type="button" onclick="member_name.value='',member_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
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
  <?php require_once './inc/script.php' ?>
  <script src="script/setting.js"></script>
</body>

</html>