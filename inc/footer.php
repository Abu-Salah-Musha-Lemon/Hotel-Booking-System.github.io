<!-- footer  -->
<div class="container-fluid bg-white mt-5">
  <div class="row">
    <div class="col-lg-4 p-4">
      <h3 class="h-font fw-bold fs-3"><?php echo $setting_r['site_title_db']?></h3>
      <p><?php echo $setting_r['site_about_db']?></p>
    </div>
    <div class="col-lg-4 p-4">
      <h5 class="mb-4">links</h5>
      <a href="index.php" class="d-inline-block mb-2 text-decoration-none text-dark">Home</a><br>
      <a href="rooms.php" class="d-inline-block mb-2 text-decoration-none text-dark">Rooms</a><br>
      <a href="facilities.php" class="d-inline-block mb-2 text-decoration-none text-dark">Facilities</a><br>
      <a href="contact.php" class="d-inline-block mb-2 text-decoration-none text-dark">Contact us</a><br>
      <a href="about.php" class="d-inline-block mb-2 text-decoration-none text-dark">About us</a><br>
    </div>

    <div class="col-lg-4 p-4">
      <h5 class="mb-4">Follow us</h5>
      <a href="<?php echo $contact_r['insta_db']?>" class="d-inline-block mb-2 text-decoration-none text-dark "
        target="_blank" rel="noopener noreferrer">
        <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-instagram px-2"></i>Instagram</span>
      </a><br>
      <a href="<?php echo $contact_r['fb_db']?>" class="d-inline-block mb-2 text-decoration-none text-dark "
        target="_blank" rel="noopener noreferrer">
        <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-facebook px-2"></i>Facebook</span>
      </a><br>

      <?php if($contact_r['insta_db']!=''){

				echo <<< data
							<a href="$contact_r[tw_db]" class="d-inline-block mb-2 text-decoration-none text-dark " target="_blank" rel="noopener noreferrer">
								<span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-twitter px-2"></i>Twitter</span>
							</a><br>
				data;
			}?>

    </div>
  </div>
</div>



<h6 class="text-center bg-dark text-white p-4 m-0 fw-bold h-font">Design & develope By ASM Lemon</h2>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="../bootstrap5.3.2.bundle.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
  function setActive() {
    let nav_bar = document.getElementById('nav-bar')
    let a_tags = document.getElementsByTagName('a');

    for (let i = 0; i < a_tags.length; i++) {
      let file = a_tags[i].href.split('/').pop();
      let file_name = file.split('.')[0];
      if (document.location.href.indexOf(file_name) >= 0) {
        a_tags[i].classList.add('active');
      }

    }

  }

  setActive()
  ///register form

  $(document).on('submit', '#register_form', function(e) {

    e.preventDefault()
    let formData = new FormData(this)
    formData.append('register_form', true)

    $.ajax({
      type: 'post',
      url: './ajax/login_registerO.php',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        // alert(response)
        var res = jQuery.parseJSON(response)
        // alert(res)

        if (res.status == 500) {
          $('#error').removeClass('d-none')
          $('#error').text(res.message)
        } else if (res.status == 200) {
          $('#error').addClass('d-none')
          $('#regModal').modal('hide')
          $('#register_form')[0].reset()
          alertify.set(res.message,'position', 'top-right');
          alertify.success('Current position : ' + alertify.get('notifier','position'));

        }
      }
    })
  })

  let login_form = document.querySelector('#login_form')

  login_form.addEventListener('submit', (e) => {
    e.preventDefault()
    let data = new FormData()
    data.append('email_mob', login_form.elements['email_mob'].value)
    data.append('password', login_form.elements['password'].value)
    data.append('login','')
    // let loginModal = document.getElementById('loginModal')
    // let modal = document.Modal.getInstance(loginModal)
    // modal.hide()
    $('#loginModal').modal('hide');
    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'ajax/login_registerO.php', true)
      xhr.onload= function (responseText) {
        if(this.responseText== 'inv_email_mob'){
          alert('invalid email/ mobile')
          login_form.reset();
        }
        else if(this.responseText== 'inactive'){
          alert('user has been blocked')
          login_form.reset();
        }
        else if(this.responseText== 'empty'){
          alert('Enter all the correct Email/Mobile and Password')
          login_form.reset();
        }
        else if(this.responseText== 'invalid_pass'){
          alert('invalid password')
          login_form.reset();
        }
        else{
          login_form.reset();
         window.location = window.location.pathname
          }
      }
      xhr.send(data)
    })

// $(document).ready(function () {
//     let login_form = $('#login_form');
//     login_form.submit(function (e) {
//         e.preventDefault();

//         let data = {
//             email_mob: login_form.find('input[name="email_mob"]').val(),
//             password: login_form.find('input[name="password"]').val()
//         };

//         $.ajax({
//             type: 'POST',
//             url: './ajax/login_registerO.php', // Update the path accordingly
//             data: data,
//             success: function (response) {
//               console.log(this.response);
//                 if (this.response == 'inv_email_mob') {
//                     alert('Error: Invalid Email / Mobile Number!');
//                 } else if (this.response == 'inactive') {
//                     alert('Error: Account is inactive!');
//                 } else if (this.response == 'invalid_pass') {
//                     alert('Error: Incorrect Password!');
//                 } else if (this.response == 1) {
//                     alert('Success: Login Successful');
//                     login_form[0].reset();
//                 } else {
//                     alert('Error: Unknown Response');
//                     console.log(this.response); // Log the response for debugging
//                 }
//             },
//             error: function (xhr, status, error) {
//                 console.error('AJAX Error:', status, error);
//             }
//         });
//     });
// });




</script>