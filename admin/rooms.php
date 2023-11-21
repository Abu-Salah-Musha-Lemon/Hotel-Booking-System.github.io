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
  <title>Admin Panel - Rooms </title>
  <?php require_once './inc/link.php' ?>
</head>

<body class="bg-light">
  <?php require_once("inc/header.php"); ?>


  <div class="col-lg-10 ms-auto p-4 overflow-hidden">
    <div class="container-fluid" id="main-content">
      <div class="row">
        <h3 class="mb-4">Rooms</h3>

        <div class="card rounded shadow-sm mb-4">
          <div class="card-body">

              <div class="text-end my-4">
                  <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#add_rooms_s">
                  <i class="bi bi-building-add"></i>
                  </button>
                </div>

                <div class="table-responsive-lg " style="height:400px; overflow-y:scroll;">
                  <table class="table table-hover">
                      <thead>
                        <tr class='bg-info text-light'>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Area</th>
                          <th scope="col">Guests</th>
                          <th scope="col">Price</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="room_data">
                      </tbody>
                    </table>
                    </table>
                </div>
                
              <!-- Add room  modal  -->

              <div class="modal fade" id="add_rooms_s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content ">
                    <form class="add_rooms_s_form" autocomplete="off">
                      <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center"> Add Rooms </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      <div class="row">

                          <div class="col-md-6 mb-2">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="name"  class="form-control shadow-none" required>
                          </div>

                          <div class="col-md-6 mb-2">
                            <label class="form-label fw-bold">Area</label>
                            <input type="number" name="area"  class="form-control shadow-none" required>
                          </div>

                          <div class="col-md-6 mb-2">
                            <label class="form-label fw-bold">Price</label>
                            <input type="number" min="1" name="price"  class="form-control shadow-none" required>
                          </div>
                          
                          <div class="col-md-6 mb-2">
                            <label class="form-label fw-bold">Quantity</label>
                            <input type="number" min="1" name="quantity"  class="form-control shadow-none" required>
                          </div>

                          <div class="col-md-6 mb-2">
                            <label class="form-label fw-bold">Adult (Max.)</label>
                            <input type="number" min="1" name="adult"  class="form-control shadow-none" required>
                          </div>

                          <div class="col-md-6 mb-2">
                            <label class="form-label fw-bold">Children (Max.)</label>
                            <input type="number" min="1" name="children"  class="form-control shadow-none" required>
                          </div>

                          <div class="col-md-12 mb-2">
                            <label class="form-label fw-bold">Features</label>
                            <div class="row">
                              <?php
                              $res = selectAll('features');
                              while ($opt = mysqli_fetch_assoc($res)) {
                                echo "

                                      <div class='col-md-3 mb-2'>
                                        <label>
                                        <input type = 'checkbox' name='features' value='$opt[sr_no]' class='form-check-in shadow-none'>
                                        $opt[db_fea_name]
                                        </label>
                                      </div>

                                ";
                              }
                              
                              ?>
                            </div>
                          </div>

                          <div class="col-md-12 mb-2">
                            <label class="form-label fw-bold">Facilities</label>
                            <div class="row">
                              <?php
                              $res = selectAll('facilities');
                              while ($opt = mysqli_fetch_assoc($res)) {
                                echo "

                                      <div class='col-md-3 mb-2'>
                                        <label>
                                        <input type = 'checkbox' name='facilities' value='$opt[sr_no]' class='form-check-in shadow-none'>
                                        $opt[db_name]
                                        </label>
                                      </div>

                                ";
                              }
                              
                              ?>
                            </div>
                          </div>

                          <div class="col-md-12 mb-2">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                            <div>

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

<!-- <script src="./script/features_facilities.js"></script> -->
<script>
// add rooms 
let add_rooms_s_form = document.querySelector(".add_rooms_s_form");

add_rooms_s_form.addEventListener('submit',function(e){
e.preventDefault()
add_rooms()
})
function add_rooms() {
      let data = new FormData();

      data.append('name', add_rooms_s_form.elements['name'].value);
      data.append('area', add_rooms_s_form.elements['area'].value);
      data.append('price', add_rooms_s_form.elements['price'].value);
      data.append('quantity', add_rooms_s_form.elements['quantity'].value);
      data.append('adult', add_rooms_s_form.elements['adult'].value);
      data.append('children', add_rooms_s_form.elements['children'].value);
      data.append('desc', add_rooms_s_form.elements['desc'].value);
      data.append('add_rooms', '');
      let feature = [];
      add_rooms_s_form.querySelectorAll('[name="features"]:checked').forEach(el => {
          feature.push(el.value);
          console.log(el.value);
      });

      let facilities = [];
      add_rooms_s_form.querySelectorAll('[name="facilities"]:checked').forEach(el => {
          facilities.push(el.value);
          console.log(el.value);
      });

      data.append('features', JSON.stringify(feature));
      data.append('facilities', JSON.stringify(facilities));
      console.log(data);

      let xhr = new XMLHttpRequest();
      xhr.open('POST', "ajax/rooms_crud.php", true);

      xhr.onload = function () {
        // module hidden  
        let myModal = document.getElementById('add_rooms_s');
        let modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (xhr.responseText == 1) {
          alert('error', 'Server faild!');
        } else {
                alert('success', 'Room successfully added!');
                  // get_facilities();
              }
      }

      console.log(data);
      xhr.send(data);

}

</script>
</body>

</html>