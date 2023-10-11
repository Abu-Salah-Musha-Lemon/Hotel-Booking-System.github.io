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
  <title>Admin Pannel - Dashboard</title>
  <?php require_once './inc/link.php'?>
</head>
<body class="bg-light">
  <div class="container-fluid bg-dark text-light p-3 d-flex align-item-center justify-content-between" >
    <h3 class="mb-0 h-font">ASML website</h3>
    <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
  </div>
  <div class="col-lg-2 bg-dark border-3 border-secoundary">
  <nav class="navbar navbar-expand-lg navbar-light bg-dark shadow-sm">
          <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2">FILTERS</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropDown"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-item-strach mt-3" id="filterDropDown">
              <div class="border bg-light p-3 rounded mb-2 w-100">
                <h5 class="mb-3">CHECK AVAILBILITY</h5>
                <lable class="form-lable">Check in</lable>
                <input type="date" name="" id="" class="form-control shadow-none mb-3">

                <lable class="form-lable mt-2">Check out</lable>
                <input type="date" name="" id="" class="form-control shadow-none">
              </div>

              <div class="border bg-light p-3 rounded mb-2 w-100">
                <h5 class="mb-3">FACILITIES</h5>
                <div class="mb-2">
                  <input class="form-check-input shadow-none" type="checkbox" value="" id="fl">
                  <label class="form-check-label" for="fl">Facility one</label>
                </div>
                <div class="mb-2">
                  <input class="form-check-input shadow-none" type="checkbox" value="" id="f2">
                  <label class="form-check-label" for="f2">Facility two</label>
                </div>
                <div class="mb-2">
                  <input class="form-check-input shadow-none" type="checkbox" value="" id="f3">
                  <label class="form-check-label" for="f3">Facility Three</label>
                </div>
              </div>

              <div class="border bg-light p-3 rounded mb-2 w-100">
                <h5 class="mb-3">GUESTS</h5>
                <div class="d-flex ">
                  <div class=" mx-2">
                    <label class="form-label">Adult</label>
                    <input type="number" value="" class="form-control shadow-none">
                  </div>
                  <div class="mb-2">
                    <label class="form-label">Child</label>
                    <input type="number" value="" class="form-control shadow-none">
                  </div>
                </div>

              </div>


            </div>

          </div>
        </nav>
  </div>



   <?php require_once './inc/script.php'?>
</body>
</html>