<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>ASML Hotel - Home</title>
	<?php include_once "./inc/link.php"?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


	<style>
		.availability-form {
			margin-top: -50px;
			z-index: 2;
			position: relative;
		}

		@media screen and (max-width:575px) {
			.availability-form {
				margin-top: 0;
				position: 0 40px;
			}
		}
	</style>
</head>

<body class="bg-light">

	<?php include_once "./inc/nav.php" ?>
	<!-- Carousel -->

	<div class="container-fluit px-lg-4 mt-2">
		<div class="swiper swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img src="https://swiperjs.com/demos/images/nature-1.jpg" class="w-100 d-block" style="height:600px;object:cover" />
				</div>
				<div class="swiper-slide">
					<img src="https://swiperjs.com/demos/images/nature-2.jpg" class="w-100 d-block" style="height:600px;object:cover" />
				</div>
				<div class="swiper-slide">
					<img src="https://swiperjs.com/demos/images/nature-3.jpg" class="w-100 d-block" style="height:600px;object:cover" />
				</div>
				<div class="swiper-slide">
					<img src="https://swiperjs.com/demos/images/nature-4.jpg" class="w-100 d-block" style="height:600px;object:cover" />
				</div>
			</div>
		</div>
	</div>

	<!-- check availability form  -->
	<div class="container availability-form">
		<div class="row ">
			<div class="col-lg-12 bg-white shadow-sm p-4 rounded">
				<h5 class="mb-4">Check Booking Availability</h5>
				<form action="">
					<div class="row align-items-end">
						<div class="col-lg-3 mb-3">
							<lable class="form-lable" style="font-weight: 500;">Check in</lable>
							<input type="date" name="" id="" class="form-control shadow-none">
						</div>
						<div class="col-lg-3 mb-3">
							<lable class="form-lable" style="font-weight: 500;">Check out</lable>
							<input type="date" name="" id="" class="form-control shadow-none">
						</div>
						<div class="col-lg-2 mb-3">
							<lable class="form-lable" style="font-weight: 500;">Adult</lable>
							<select class="form-select shadow-none">
								<option selected>Open this select menu</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
						</div>
						<div class="col-lg-2 mb-3">
							<lable class="form-lable" style="font-weight: 500;">Child</lable>
							<select class="form-select shadow-none">
								<option selected>Open this select menu</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
						</div>
						<div class="col-lg-1 mb-lg-3 mt-2">
							<button type="submit" class="btn text-white shadow-nonem custom-bg">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>

	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 my-3">

				<div class="card border-0 shadow-sm" style="width: 350px; margin: auto;">
					<img src="https://images.pexels.com/photos/5088877/pexels-photo-5088877.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" style="height: 300px ; object-fit: cover;" class="card-img-top" alt="...">

					<div class="card-body">
						<h5 class="card-title">Single Room Name</h5>
						<h6 class="mb-4">$ 200 per night</h6>

						<div class="features mb-4">
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

						<div class="facilities mb-4">
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

						<div class="rating mb-4">
							<h6 class="mb-1">Rating</h6>
							<span class="badge rounded-pill bg-light text-dark text-wrap">
								<i class="bi bi-star-fill text-warning"></i>
								<i class="bi bi-star-fill text-warning"></i>
								<i class="bi bi-star-fill text-warning"></i>
								<i class="bi bi-star-fill text-warning"></i>
								<i class="bi bi-star-fill text-warning"></i>
							</span>
						</div>
						<div class="d-flex justify-content-between mb-2">
							<a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
							<a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>

						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 my-3">

				<div class="card border-0 shadow-sm" style="width: 350px; margin: auto;">
					<img src="https://images.pexels.com/photos/1879061/pexels-photo-1879061.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" style="height: 300px ; object-fit: cover;" class="card-img-top" alt="...">

					<div class="card-body">
						<h5 class="card-title">Single Room Name</h5>
						<h6 class="mb-4">$ 200 per night</h6>

						<div class="features mb-4">
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

						<div class="facilities mb-4">
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

						<div class="rating mb-4">
							<h6 class="mb-1">Rating</h6>
							<span class="badge rounded-pill bg-light text-dark text-wrap">
								<i class="bi bi-star-fill text-warning"></i>
								<i class="bi bi-star-fill text-warning"></i>
								<i class="bi bi-star-fill text-warning"></i>
								<i class="bi bi-star-fill text-warning"></i>
								<i class="bi bi-star-fill text-warning"></i>
							</span>
						</div>
						<div class="d-flex justify-content-between mb-2">
							<a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
							<a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>

						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 my-3">

				<div class="card border-0 shadow-sm" style="width: 350px; margin: auto;">
					<img src="https://images.pexels.com/photos/1457842/pexels-photo-1457842.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" style="height: 300px ; object-fit: cover;" class="card-img-top" alt="...">

					<div class="card-body">
						<h5 class="card-title">Single Room Name</h5>
						<h6 class="mb-4">$ 200 per night</h6>

						<div class="features mb-4">
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

						<div class="facilities mb-4">
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

						<div class="rating mb-4">
							<h6 class="mb-1">Rating</h6>
							<span class="badge rounded-pill bg-light text-dark text-wrap">
								<i class="bi bi-star-fill text-warning"></i>
								<i class="bi bi-star-fill text-warning"></i>
								<i class="bi bi-star-fill text-warning"></i>
								<i class="bi bi-star-fill text-warning"></i>
								<i class="bi bi-star-fill text-warning"></i>
							</span>
						</div>
						<div class="d-flex justify-content-between mb-2">
							<a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
							<a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>

						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 text-center mt-5">
				<a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
			</div>
		</div>
	</div>
	<!-- our Facilities  -->
	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>

	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow-sm py-4 my-3 mx-2">
				<i class="bi bi-wifi fw-bold fs-5"></i>
				<h5 class="mt-3">Wifi</h5>
			</div>
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow-sm py-4 my-3 mx-2">
				<i class="bi bi-star-fill text-warning fw-bold fs-5"></i>
				<h5 class="mt-3">Star </h5>
			</div>
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow-sm py-4 my-3 mx-2">
				<i class="bi bi-wifi fw-bold fs-5"></i>
				<h5 class="mt-3">Wifi</h5>
			</div>
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow-sm py-4 my-3 mx-2">
				<i class="bi bi-wifi fw-bold fs-5"></i>
				<h5 class="mt-3">Wifi</h5>
			</div>
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow-sm py-4 my-3 mx-2">
				<i class="bi bi-wifi fw-bold fs-5"></i>
				<h5 class="mt-3">Wifi</h5>
			</div>
			<div class="col-lg-12 text-center mt-5">
				<a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More FACILITIES >>></a>
			</div>
		</div>
	</div>

	<!-- Testimonials  -->
	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR Testimonials</h2>

	<div class="container mt-5">
		<div class="swiper swiper_testimonial">
			<div class="swiper-wrapper">

				<div class="swiper-slide bg-white p-4">

					<div class="profile d-flex align-items-center mb-2">
						<i class="bi bi-star-fill text-dark fs-2 fw-900"></i>
						<h6 class="m-0 ms-2">Random user!</h6>

					</div>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad necessitatibus perspiciatis at expedita earum sapiente soluta similique</p>
					<div class="rating">
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
					</div>
				</div>

				<div class="swiper-slide bg-white p-4">

					<div class="profile d-flex align-items-center mb-2">
						<i class="bi bi-star-fill text-dark fs-2 fw-900"></i>
						<h6 class="m-0 ms-2">Random user!</h6>

					</div>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad necessitatibus perspiciatis at expedita earum sapiente soluta similique</p>
					<div class="rating">
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
					</div>
				</div>

				<div class="swiper-slide bg-white p-4">

					<div class="profile d-flex align-items-center mb-2">
						<i class="bi bi-star-fill text-dark fs-2 fw-900"></i>
						<h6 class="m-0 ms-2">Random user!</h6>

					</div>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad necessitatibus perspiciatis at expedita earum sapiente soluta similique</p>
					<div class="rating">
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
					</div>
				</div>

			</div>
			<div class="swiper-pagination"></div>
		</div>
		<div class="col-lg-12 text-center mt-5">
			<a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know More >>></a>
		</div>
	</div>


	<!-- Reach us  -->
	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
				<iframe class="w-100 rounded" height="450" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.49996414292!2d90.2545337824612!3d23.78106687068126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1694111059484!5m2!1sbn!2sbd" loading="lazy"></iframe>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="bg-white p-4 rounded mb-4">
					<h6> Cell us</h6>
					<a href="tel:+8812345555" class="d-inline-block text-decoration-none text-dark 
				"><i class="bi bi-telephone-fill fs-6 text-info"></i>+8812345555</a><br>
					<a href="tel:+8812345555" class="d-inline-block text-decoration-none text-dark 
				"><i class="bi bi-telephone-fill fs-6 text-info"></i>+8812345555</a>
				</div>
				<div class="bg-white p-4 rounded mb-4">
					<h6> Follow us</h6>
					<a href="#" class="d-inline-block mb-3">
						<span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-twitter px-2"></i>Twitter</span>
					</a><br>
					<a href="#" class="d-inline-block mb-3">
						<span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-facebook px-2"></i>Facebook</span>
					</a><br>
					<a href="#" class="d-inline-block mb-3">
						<span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-twitter px-2"></i>Twitter</span>
					</a><br>
				</div>
			</div>
		</div>
	</div>

	<?php include_once "./inc/footer.php" ?>
	
	<script>
		var swiper = new Swiper(".swiper-container", {
			spaceBetween: 30,
			effect: "fade",
			loop: true,
			autoplay: {
				delay: 3500,
				disableOnInteraction: false
			}

		});
		var swiper = new Swiper(".swiper_testimonial", {
			effect: "coverflow",
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: "auto",
			sliderPreView: "3",
			loop: true,
			coverflowEffect: {
				rotate: 50,
				stretch: 0,
				depth: 100,
				modifier: 1,
				slideShadows: false,
			},
			pagination: {
				el: ".swiper-pagination",
			},
			breakpoints: {
				320: {
					sliderPreView: 1,
				},
				640: {
					sliderPreView: 1,
				},
				768: {
					sliderPreView: 2,
				},

				1024: {
					sliderPreView: 3,
				},
			}
		});
	</script>
</body>

</html>