<!DOCTYPE html>
<html lang="en">
<?php //header("Refresh:2");?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ASML Hotel - Facilities</title>
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
		<h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
		<div class="h-line bg-dark"></div>
		 <p class="text-center mt-3">
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque explicabo eius officiis <br> saepe ipsum optio, nostrum impedit aspernatur! Sed, quam!
		 </p>
	</div>

<div class="container">
	<div class="row">

	<?php
		$res = selectAll('facilities');
		$path= FACILITIES_IMG_PATH;

			while ($row = mysqli_fetch_assoc($res)) {
				echo <<<data
							<div class="col-lg-4 col-md-6 mb-5 px-4">
								<div class="bg-white rounded shadow-sm p-4 border-top border-4 border-dark pop">
									<div class="d-flex align-items-center">
										<img src="$path$row[db_icon]" style="width:100px;height:100px;">
										<h5 class="m-0 ms-3">$row[db_name]</h5>
										</div>
										<p>$row[db_desc]</p>
								</div>
							</div>
				data;
			}

	?>

	</div>
</div>


    <?php include_once "./inc/footer.php";?>
</body>
</html>