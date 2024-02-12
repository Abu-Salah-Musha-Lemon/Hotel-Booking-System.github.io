<?php 
require_once ('./admin/inc/config.php');
require_once ('./admin/inc/essential.php');

// this section use all the page load contact details.
$contact_q = "SELECT * FROM `contact_details` WHERE `sr_no` = ?";
$setting_q = "SELECT * FROM `setting` WHERE `sr_no` = ?";
$contact_value = [2];
$value = [1];
$contact_r =mysqli_fetch_assoc( select($contact_q, $contact_value,'i'));

$setting_r =mysqli_fetch_assoc( select($setting_q,$value,'i'));

// C:\xampp\htdocs\Hotel-Booking\Hotel-Booking-System.io\admin/inc/essential.php

?>


<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-light bg-white px-lg-2 py-lg-2 shadow-sm sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand me-5 fw-bold fs-3 h-font" href="#"><?php echo $setting_r['site_title_db']?></a>
			<button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link  me-2"  href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link me-2" href="rooms.php">Rooms</a>
					</li>
					</li>
					<li class="nav-item">
						<a class="nav-link me-2" href="facilities.php">Facilities</a>
					</li>
					</li>
					<li class="nav-item">
						<a class="nav-link me-2" href="contact.php">Contact us</a>
					</li>
					</li>
					<li class="nav-item">
						<a class="nav-link me-2" href="about.php">About</a>
					</li>
				</ul>
				<?php
				// print_r( $_SESSION);
				// session_destroy();
	if (isset($_SESSION['login'])&& $_SESSION['login']==true) {
		$path = USER_IMG_PATH;
		echo <<< data
				<div class="btn-group">
				<button type="button" class="btn btn-secondary dropdown-toggle shadow-sm" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
				
				$_SESSION[uName]
				</button>
				<ul class="dropdown-menu dropdown-menu-lg-end">
					<li><a class="dropdown-item" href="profile.php">Profile</a></li>
					<li><a class="dropdown-item" href="booking.php">Booking</a></li>
					<li><a class="dropdown-item" href="logout.php">Logout</a></li>
					
				</ul>
			</div>
		data;
	}else{
		echo <<<data
					<div class="d-flex">
						<button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal"data-bs-target="#loginModal">
								login
							</button>
							<button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal"data-bs-target="#regModal">
								Register
							</button>
					</div>
		data;
	}
				?>

			</div>
		</div>
	</nav>


	<!-- logIn modal -->

	<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="login_form">
					<div class="modal-header">
						<h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle fs-3 text-info px-1"></i> User Login</h5>
						<button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-4">
							<label class="form-label">Email address</label>
							<input type="email" name ="email_mob" class="form-control shadow-none" require>
						</div>
						<div class="mb-4">
							<label class="form-label">Password</label>
							<input type="password" name="password" class="form-control shadow-none" require>
						</div>
						<div class="d-flex align-items-center justify-content-between mb-2">
							<button type="submit" name='login' class="btn btn-outline-success shadow-sm">LogIn</button>
							<button type="button" class="btn text-secondary text-decoration-none shadow-none me-lg-3 me-3"
							 data-bs-toggle="modal"data-bs-target="#forgotModal"  data-bs-dismiss="modal">
							Forgot Password
							</button>
							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<!-- forgot modal -->

<div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="forgot_form">
					<div class="modal-header">
						<h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle fs-3 text-info px-1"></i> User Login</h5>
						<button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-4">
							<label class="form-label">Email address</label>
							<input type="email" name ="email" class="form-control shadow-none" require>
						</div>
						<div class="d-flex align-items-center justify-content-between mb-2">
							<button type="button" class="btn btn-outline-danger shadow-sm" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn text-secondary text-decoration-none shadow-none me-lg-3 me-3" data-bs-toggle="modal"data-bs-target="#loginModal"  data-bs-dismiss="modal">
							send link
							</button>
							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- register modal -->
	<div class="modal fade" id="regModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<form id="register_form">
					<div class="modal-header">
						<h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-lines-fill fs-3 text-info px-1"> </i> User
							Registration</h5>
						<button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>

					<div class="modal-body">
						<span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
							Note: Your details use match with your ID( NID card, passport, driving license etc) that will be required
							during check-in.
						</span>

						<div class="container-fluid">
							<div class="row">
								<div id="error d-none"></div>
								<div class="col-md-6 ps-0 mb-3">
									<label class="form-label">Name</label>
									<input type="text" name="name" class="form-control shadow-none" required>
								</div>

								<div class="col-md-6 ps-0 mb-3">
									<label class="form-label">Email</label>
									<input type="email" name="email" class="form-control shadow-none" required>
								</div>

								<div class="col-md-6 ps-0 mb-3">
									<label class="form-label">Phone Number</label>
									<input type="number" name="phone" class="form-control shadow-none" required>
								</div>

								<div class="col-md-6 ps-0 mb-3">
									<label class="form-label">Picture</label>
									<input type="file" name="pic" class="form-control shadow-none" required>
								</div>

								<div class="col-md-12 ps-0 mb-3">
									<label class="form-label">Address</label>
									<textarea name="address" id="" cols="0" rows="1" class="form-control shadow-none" required></textarea>
								</div>

								<div class="col-md-6 ps-0 mb-3">
									<label class="form-label">Pincode</label>
									<input type="number" name="pincode" class="form-control shadow-none" required>
								</div>

								<div class="col-md-6 ps-0 mb-3">
									<label class="form-label">Date of Birth</label>
									<input type="date" name="data" class="form-control shadow-none"required>
								</div>

								<div class="col-md-6 ps-0 mb-3">
									<label class="form-label">Password</label>
									<input type="password" name="password" class="form-control shadow-none"required>
								</div>

								<div class="col-md-6 ps-0 mb-3">
									<label class="form-label">Confirm Password</label>
									<input type="password" name="cpassword" class="form-control shadow-none"required>
								</div>

							</div>
						</div>

						<div class="text-center my-1">
							<button type="submit" class="btn btn-outline-success shadow-none">REGISTER</button>
						</div>


						<!-- <div class="mb-4">
							<label class="form-label">Email address</label>
							<input type="email" class="form-control shadow-none">
						</div>
						<div class="mb-4">
							<label class="form-label">Password</label>
							<input type="password" class="form-control shadow-none">
						</div>
						<div class="d-flex align-items-center justify-content-between mb-2">
							<button type="submit" class="btn btn-dark shadow-none">LogIn</button>
							<a href="javascript:void(0)" class="text-secondary text-decoration-none
							">Forgot Password</a>
						</div> -->
					</div>
				</form>
			</div>
		</div>
	</div>