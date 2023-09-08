
<!-- footer  -->
<div class="container-fluid bg-white mt-5">
	<div class="row">
		<div class="col-lg-4 p-4">
			<h3 class="h-font fw-bold fs-3">ASM HOTEL</h3>
			<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi mollitia, harum minus numquam necessitatibus nemo rem praesentium officia sapiente doloribus quaerat aliquam voluptatem ex maiores eveniet laboriosam incidunt impedit dignissimos.</p>
		</div>
		<div class="col-lg-4 p-4">
			<h5  class="mb-4">links</h5>
			<a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">Home</a><br>
			<a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">Rooms</a><br>
			<a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">Facilities</a><br>
			<a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">Contact us</a><br>
			<a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">Abour us</a><br>
		</div>

		<div class="col-lg-4 p-4">
			<h5 class="mb-4">Follow us</h5>
			<a href="#" class="d-inline-block mb-2 text-decoration-none text-dark " >
				<span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-twitter px-2"></i>Twitter</span>
			</a><br>
			<a href="#" class="d-inline-block mb-2 text-decoration-none text-dark " >
				<span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-facebook px-2"></i>Facebook</span>
			</a><br>
			<a href="#" class="d-inline-block mb-2 text-decoration-none text-dark " >
				<span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-twitter px-2"></i>Twitter</span>
			</a><br>
		</div>
	</div>
</div>



<h6 class="text-center bg-dark text-white p-4 m-0 fw-bold h-font">Desigh & develope By ASM Lemon</h2>









	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
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
			sliderPreView:"3",
			loop:true,
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
			breakpoints:{
				320:{
					sliderPreView:1,
				},
				640:{
					sliderPreView:1,
				},
				768:{
					sliderPreView:2,
				},
			
				1024:{
					sliderPreView:3,
				},
			}
    });
	</script>

</body>

</html>