<?php
// header("Content-Type: text/plain; charset=utf-8");
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
  <?php require_once './inc/link.php' ?>
  <title><?php //echo $setting_r['site_title_db']?> Admin - Rooms </title>
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
              <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal"
                data-bs-target="#add_rooms_s">
                <i class="bi bi-building-add"></i>
              </button>
            </div>

            <div class="table-responsive-lg " style="height:400px; overflow-y:scroll;">
              <table class="table table-hover text-center">
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

            <!-- edit room  modal  -->

            <div class="modal fade" id="edit_rooms_s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
              aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                  <form class="edit_rooms_s_form" autocomplete="off">
                      <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center"> Edit Rooms </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      <div class="row">

                        <div class="col-md-6 mb-2">
                          <label class="form-label fw-bold">Name</label>
                          <input type="text" name="name" class="form-control shadow-none" required>
                        </div>

                        <div class="col-md-6 mb-2">
                          <label class="form-label fw-bold">Area</label>
                          <input type="number" name="area" class="form-control shadow-none" required>
                        </div>

                        <div class="col-md-6 mb-2">
                          <label class="form-label fw-bold">Price</label>
                          <input type="number" min="1" name="price" class="form-control shadow-none" required>
                        </div>

                        <div class="col-md-6 mb-2">
                          <label class="form-label fw-bold">Quantity</label>
                          <input type="number" min="1" name="quantity" class="form-control shadow-none" required>
                        </div>

                        <div class="col-md-6 mb-2">
                          <label class="form-label fw-bold">Adult (Max.)</label>
                          <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                        </div>

                        <div class="col-md-6 mb-2">
                          <label class="form-label fw-bold">Children (Max.)</label>
                          <input type="number" min="1" name="children" class="form-control shadow-none" required>
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

                        <input type="hidden" name="room_id">

                        <div class="modal-footer">
                          <button type="reset" class="btn text-secondary shadow-none"
                            data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn custom-bg text-green shadow-none">Submit</button>
                        </div>

                      </div>
                  </form>
                </div>
              </div>
            </div>                
                <tbody id="rooms_data">
                </tbody>
              </table>
             </div>

            <!-- Add room  modal  -->

            <div class="modal fade" id="add_rooms_s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
              aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                  <form class="add_rooms_s_form" autocomplete="off">
                    <div class="modal-header">
                      <h5 class="modal-title d-flex align-items-center"> Add Rooms </h5>
                      <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="row">

                        <div class="col-md-6 mb-2">
                          <label class="form-label fw-bold">Name</label>
                          <input type="text" name="name" class="form-control shadow-none" required>
                        </div>

                        <div class="col-md-6 mb-2">
                          <label class="form-label fw-bold">Area</label>
                          <input type="number" name="area" class="form-control shadow-none" required>
                        </div>

                        <div class="col-md-6 mb-2">
                          <label class="form-label fw-bold">Price</label>
                          <input type="number" min="1" name="price" class="form-control shadow-none" required>
                        </div>

                        <div class="col-md-6 mb-2">
                          <label class="form-label fw-bold">Quantity</label>
                          <input type="number" min="1" name="quantity" class="form-control shadow-none" required>
                        </div>

                        <div class="col-md-6 mb-2">
                          <label class="form-label fw-bold">Adult (Max.)</label>
                          <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                        </div>

                        <div class="col-md-6 mb-2">
                          <label class="form-label fw-bold">Children (Max.)</label>
                          <input type="number" min="1" name="children" class="form-control shadow-none" required>
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
                            <button type="reset" class="btn text-secondary shadow-none"
                              data-bs-dismiss="modal">Cancel</button>
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

    </div>

    <!-- <script src="./script/features_facilities.js"></script> -->
    <script>
    // add rooms 
    let add_rooms_s_form = document.querySelector(".add_rooms_s_form");

    add_rooms_s_form.addEventListener('submit', function(e) {
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
      });

      let facilities = [];
      add_rooms_s_form.querySelectorAll('[name="facilities"]:checked').forEach(el => {
        facilities.push(el.value);
      });

      data.append('features', JSON.stringify(feature));
      data.append('facilities', JSON.stringify(facilities));

      let xhr = new XMLHttpRequest();
      xhr.open('POST', "ajax/rooms_crud.php", true);

      xhr.onload = function() {
        // module hidden  
        let myModal = document.getElementById('add_rooms_s');
        let modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        // console.log(this.responseText);
        if (this.responseText == 1) {
          alert('error', 'Server failed!');
        } else {
          alert('success', 'Room successfully added!');
          get_all_rooms()
        }
      }
      xhr.send(data);

    }

    // show rooms in admin panel
    function get_all_rooms() {

      let xhr = new XMLHttpRequest();
      xhr.open('POST', "ajax/rooms_crud.php", true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onload = function() {
        document.getElementById('rooms_data').innerHTML = this.responseText;
      }
      xhr.send('get_all_rooms')
    }
//edit rooms show details
    let edit_rooms_s_form = document.querySelector(".edit_rooms_s_form");

    function edit_details(id) {
      let xhr = new XMLHttpRequest();
      xhr.open('POST', "ajax/rooms_crud.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {

        let data = JSON.parse(this.responseText);
        console.log(data);
        let roomData = data.roomData;

        // Set values in the form
        edit_rooms_s_form.elements['name'].value = roomData.name;
        edit_rooms_s_form.elements['area'].value = roomData.area;
        edit_rooms_s_form.elements['price'].value = roomData.price;
        edit_rooms_s_form.elements['quantity'].value = roomData.quantity;
        edit_rooms_s_form.elements['adult'].value = roomData.adult;
        edit_rooms_s_form.elements['children'].value = roomData.child;
        edit_rooms_s_form.elements['desc'].value = roomData.desc;

        // Set hidden field for room_id
        edit_rooms_s_form.elements['room_id'].value = roomData.id;


        edit_rooms_s_form.elements['facilities'].forEach(el=>{
          if (data.facilities.includes(Number(el.value))) {
          el.checked = true;}
        })
        edit_rooms_s_form.elements['features'].forEach(el=>{
          if (data.features.includes(Number(el.value))) {
          el.checked = true;}
        })

      };
      
      xhr.send('get_rooms=' + id);
}

// update edited Details
edit_rooms_s_form.addEventListener('submit', function(e) {
      e.preventDefault()
      edit_rooms_details()
    })

function edit_rooms_details() {
      let data = new FormData();

      data.append('edit_rooms', '');///new class passed
      data.append('room_id', edit_rooms_s_form.elements['room_id'].value);
      data.append('name', edit_rooms_s_form.elements['name'].value);
      data.append('area', edit_rooms_s_form.elements['area'].value);
      data.append('price', edit_rooms_s_form.elements['price'].value);
      data.append('quantity', edit_rooms_s_form.elements['quantity'].value);
      data.append('adult', edit_rooms_s_form.elements['adult'].value);
      data.append('children', edit_rooms_s_form.elements['children'].value);
      data.append('desc', edit_rooms_s_form.elements['desc'].value);
      let feature = [];
      edit_rooms_s_form.querySelectorAll('[name="features"]:checked').forEach(el => {
        feature.push(el.value);
      });

      let facilities = [];
      edit_rooms_s_form.querySelectorAll('[name="facilities"]:checked').forEach(el => {
        facilities.push(el.value);
      });

      data.append('features', JSON.stringify(feature));
      data.append('facilities', JSON.stringify(facilities));

      let xhr = new XMLHttpRequest();
      xhr.open('POST', "ajax/rooms_crud.php", true);

      xhr.onload = function() {
        // module hidden  
        let myModal = document.getElementById('edit_rooms_s');
        let modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        // console.log(this.responseText);
        if (this.responseText == 1) {
          alert('error', 'Server failed!');
        } else {
          alert('success', 'Room details Update successfully!');
          edit_rooms_s_form.reset()
          get_all_rooms()
        }
      }
      xhr.send(data);

    }


    // toggle button
    function toggle_status(id, val) {

      let xhr = new XMLHttpRequest();
      xhr.open('POST', "ajax/rooms_crud.php", true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onload = function() {
        if (this.responseText == 1) {
          alert('success', 'active room');
          get_all_rooms()
        } else {
          alert('error', 'Server failed!');
        }
      }
      xhr.send('toggle_status=' + id + '&value=' + val)
    }


    window.onload = function() {
      get_all_rooms()
      edit_details()
    }
  </script>
    <?php require_once './inc/script.php' ?>
    <!-- Add these lines to include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-eA8VpXtH90dIkMrBq6hACeP6fzZbMxLlE1JBA9LbXakU31+6Z/hRTt8+pR6L4N2" crossorigin="anonymous">
    </script>

</body>

</html>