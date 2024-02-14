<!DOCTYPE html>
<html lang="en">
<?php //header("Refresh:2");?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include_once "./inc/link.php";?>
    <title><?php echo $setting_r['site_title_db']?> - About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <style>
    .box:hover {
        border-top-color: var(--teal) !important;
        transform: scale(1.03);
        transition: all .3s;
    }
    </style>
</head>

<body class="bg-light">
    <?php include_once "./inc/nav.php";?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">ABOUT</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque explicabo eius officiis <br> saepe ipsum
            optio, nostrum impedit aspernatur! Sed, quam!
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center shadow-sm">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3">Lorem ipsum dolor sit amet.</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis cupiditate necessitatibus voluptate
                    nihil voluptas at, odit obcaecati alias?</p>
            </div>
            <div class="col-lg-6 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="https://images.pexels.com/photos/834863/pexels-photo-834863.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="" srcset="" style="width: 400px;height: 300px;object-fit: cover;">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white round shadow-sm p-4 border-top border-4 text-center box">
                    <i class="bi bi-buildings fs-1 text-info"></i>
                    <h4 class="mt-3">100 ROOMS</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white round shadow-sm p-4 border-top border-4 text-center box">
                    <i class="bi bi-eye-fill fs-1 text-info"></i>
                    <h4 class="mt-3">150+ REVIEW</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white round shadow-sm p-4 border-top border-4 text-center box">
                    <img src="https://images.pexels.com/photos/6289100/pexels-photo-6289100.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="" srcset="" style="width: 80px;height: 80px; object-fit: cover;">
                    <h4 class="mt-3">100 ROOMS</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white round shadow-sm p-4 border-top border-4 text-center box">
                    <i class="bi bi-people-fill fs-1 text-warning"></i>
                    <h4 class="mt-3">150+ STAPS</h4>
                </div>
            </div>


        </div>
    </div>

		<!-- MANAGEMENT TEAMS -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">MANAGEMENT TEAMS</h2>

    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">

            <?php 
                $about_r = selectAll('team_details');
                while ($row = mysqli_fetch_assoc($about_r)) {
                    $path = ABOUT_IMG_PATH;
                    echo <<<data
                            <div class="swiper-slide bg-white text-center overfollow-hidden rounded p-4 shadow-sm">
                                <img src="$path$row[tm_picture_db]"
                                    alt="" class="w-100  rounded">
                                <h4 class="mt-2">$row[tm_name_db]</h4>
                            </div>
                    data;
                }
            ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
		
    <?php include_once "./inc/footer.php";?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 40,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
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
        },
    });
    </script>
</body>

</html>