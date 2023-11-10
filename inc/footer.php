
<!-- footer  -->
<div class="container-fluid bg-white mt-5">
	<div class="row">
		<div class="col-lg-4 p-4">
			<h3 class="h-font fw-bold fs-3">ASM HOTEL</h3>
			<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi mollitia, harum minus numquam necessitatibus nemo rem praesentium officia sapiente doloribus quaerat aliquam voluptatem ex maiores eveniet laboriosam incidunt impedit dignissimos.</p>
		</div>
		<div class="col-lg-4 p-4">
			<h5  class="mb-4">links</h5>
			<a href="index.php" class="d-inline-block mb-2 text-decoration-none text-dark">Home</a><br>
			<a href="rooms.php" class="d-inline-block mb-2 text-decoration-none text-dark">Rooms</a><br>
			<a href="facilities.php" class="d-inline-block mb-2 text-decoration-none text-dark">Facilities</a><br>
			<a href="contact.php" class="d-inline-block mb-2 text-decoration-none text-dark">Contact us</a><br>
			<a href="about.php" class="d-inline-block mb-2 text-decoration-none text-dark">About us</a><br>
		</div>

		<div class="col-lg-4 p-4">
			<h5 class="mb-4">Follow us</h5>
			<a href="<?php echo $contact_r['insta_db']?>" class="d-inline-block mb-2 text-decoration-none text-dark " target="_blank" rel="noopener noreferrer" >
				<span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-instagram px-2"></i>Instagram</span>
			</a><br>
			<a href="<?php echo $contact_r['fb_db']?>" class="d-inline-block mb-2 text-decoration-none text-dark " target="_blank" rel="noopener noreferrer" >
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

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
	<script>
		function setActive() {
			let nav_bar = document.getElementById('nav-bar')
			let a_tags = document.getElementsByTagName('a');

			for (let i = 0; i <a_tags.length; i++) {
				let file = a_tags[i].href.split('/').pop();
				let file_name = file.split('.')[0];
				if (document.location.href.indexOf(file_name)>=0) {
					a_tags[i].classList.add('active');
				}
				
			}

	} setActive();
	</script>
	

