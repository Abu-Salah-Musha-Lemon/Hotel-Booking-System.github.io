<!DOCTYPE html>
<html lang="en">
<?php // header("Refresh:2");?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ASML Hotel - Contact </title>
    <?php include_once "./inc/link.php";?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
		<style>
			.pop:hover{
				border-top-color: var(--teal) !important;
				transform: scale(1.03);
				transition: all .3s ;
			}
		</style>

</head>

<body class="bg-light">
    <?php include_once "./inc/nav.php";?>
	<div class="my-5 px-4">
		<h2 class="fw-bold h-font text-center">CONTACT US</h2>
		<div class="h-line bg-dark"></div>
		 <p class="text-center mt-3">
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque explicabo eius officiis <br> saepe ipsum optio, nostrum impedit aspernatur! Sed, quam!
		 </p>
	</div>
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 mb-5 px-4">
			<div class="bg-white rounded shadow-sm p-4 ">
			<iframe class="w-100 rounded mb-4" height="450" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.49996414292!2d90.2545337824612!3d23.78106687068126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1694111059484!5m2!1sbn!2sbd" loading="lazy"></iframe>

				<h4>ADDRESS</h4>
				<a href="<?php echo $contact_r['gmap_db'] ?>" target="_blank" class="d-inline-block text-decoration-none text-dark">
				<i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['address_db'] ?>
				</a>

				<h6 class="mt-4"> Cell us</h6>
					<a href="tel:+<?php echo $contact_r['pn1_db'] ?>" class="d-inline-block text-decoration-none text-dark 
				"><i class="bi bi-telephone-fill fs-6 text-info"></i>+<?php echo $contact_r['pn1_db'] ?></a><br>

				<?php 
		 
				if ($contact_r['pn2_db']!='') {
					echo <<< data
								<a href="tel:+$contact_r[pn2_db]" class="d-inline-block text-decoration-none text-dark 
							"><i class="bi bi-telephone-fill fs-6 text-info"></i>+ $contact_r[pn2_db]</a>
						data;
				}
			
	
				?>


				<h6 class="mt-4"> Email</h6>
					<a href="<?php echo $contact_r['email_db'] ?>" class="d-inline-block text-decoration-none text-dark">
						<i class="bi bi-envelope-fill mx-1"></i><?php echo $contact_r['email_db'] ?>
					</a>

					<h6 class="mt-4"> Follow us</h6>
					<a href="<?php echo $contact_r['fb_db'] ?>"class="d-inline-block text-dark fs-5 me-2" target="_blank" rel="noopener noreferrer">
					<i class="bi bi-instagram px-2 me-1"></i>
					</a>
					<a href="<?php echo $contact_r['insta_db'] ?>"class="d-inline-block text-dark fs-5 me-2" target="_blank" rel="noopener noreferrer">
						<i class="bi bi-facebook px-2 me-1"></i>
					</a>
					<?php 
						if ($contact_r['tw_db']!='') {
							echo <<< data
											<a href="$contact_r[tw_db]"class="d-inline-block text-dark fs-5 me-2" target="_blank" rel="noopener noreferrer">
												<i class="bi bi-twitter px-2 me-1"></i>
											</a>
							data;
						}
					
					?>


			</div>
		</div>
		<div class="col-lg-6 col-md-6 mb-5 px-4">
			<div class="bg-white rounded shadow-sm p-4 ">
				<form action="#">
					<h5>Send a massage</h5>
					<div class="mt-3">
						<lable class="form-lable" style="font-weight: 500;">Name</lable>
						<input type="text" name="" class="form-control shadow-none" id="">
					</div>
					<div class="mt-3">
						<lable class="form-lable" style="font-weight: 500;">Email</lable>
						<input type="email" name="" class="form-control shadow-none" id="">
					</div>
					<div class="mt-3">
						<lable class="form-lable" style="font-weight: 500;">Subject</lable>
						<input type="email" name="" class="form-control shadow-none" id="">
					</div>
					<div class="mt-3">
						<lable class="form-lable" style="font-weight: 500;">Massage</lable>
						<textarea name="" id="" cols="30" rows="6" style="resize: none;" class="form-control shadow-none"></textarea>
					</div>
					<button type="submit" class="btn -text-white custom-bg mt-3 shadow-none"> Send</button>
				</form>
			</div>
		</div>
	</div>
</div>

    <?php include_once "./inc/footer.php";?>
</body>
</html>