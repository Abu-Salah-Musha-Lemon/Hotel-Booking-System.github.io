<!DOCTYPE html>
<html lang="en">
<?php //header("Refresh:5");?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ASML Hotel - ROOMS </title>
  <?php include_once "./inc/link.php";?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <style>
  .pop:hover {
    border-top-color: var(--teal) !important;
    transform: scale(1.03);
    transition: all .3s;
  }
  </style>

</head>

<body class="bg-light">
  <?php include_once "./inc/nav.php";?>
  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center"> OURS ROOMS </h2>
    <div class="h-line bg-dark"></div>

  </div>

  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-12 mb-lg-0 mb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow-sm">
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


            <!-- <div class="collapse navbar-collapse flex-column align-item-strach mt-3" id="filterDropDown">
              <div class="border bg-light p-3 rounded mb-3">
                <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                <div class="mb-2">
                  <input class="form-check-input shadow-none" type="checkbox" value="" id="fl">
                  <label class="form-check-label" for="fl">Facility one</label>
                </div>
                <div class="mb-2">
                  <input class="form-check-input shadow-none" type="checkbox" value="" id="fl">
                  <label class="form-check-label" for="fl">Facility one</label>
                </div>
                <div class="mb-2">
                  <input class="form-check-input shadow-none" type="checkbox" value="" id="fl">
                  <label class="form-check-label" for="fl">Facility one</label>
                </div>
              </div>
            </div> -->

          </div>
        </nav>
      </div>

      <div class="col-lg-9 col-md-12 px-4">
        <div class="card mb-4 border-0 shadow-sm p-2 rounded">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <img
                src="https://images.pexels.com/photos/376531/pexels-photo-376531.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
              <h5 class="card-title">Single Room Name</h5>
              <div class="features mb-2">
                <h6 class="mb-1">Features</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  2 Rooms
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  1 Bathroom
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  1 Balcony
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  3 Sofa
                </span>
              </div>

              <div class="facilities mb-2">
                <h6 class="mb-1">Features</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  wifi
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Telephone
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  AC
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Room header
                </span>
              </div>
              <div class="Guests mb-2">
                <h6 class="mb-1">Guests</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  5 Adults
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  4 Children
                </span>
              </div>
            </div>
            <div class="col-md-2 mt-lg-4 mt-md-4 mt-4 text-center">
              <h6 class="mb-4">$ 200 per night</h6>

              <a href="#" class="btn btn-sm w-100 mb-2 text-white custom-bg shadow-none">Book Now</a>
              <a href="#" class="btn btn-sm w-100 mb-2 btn-outline-dark shadow-none">More Details</a>
            </div>
          </div>
        </div>

				
      </div>
    </div>
  </div>
  </div>

  <?php include_once "./inc/footer.php";?>
</body>

</html>