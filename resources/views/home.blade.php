@extends('layouts.main')

@section('konten')
<div class="container text-center mt-5 fadeinUp">
  <img src="{{asset('img/SEA.png')}}" alt="SEA Logo" class="logo w-100">
  <div class="card mt-4">
      <div class="card-header bg-teal text-white">
          <h3 style="color: white;">Apa Itu SEA?</h3>
      </div>
      <div class="card-body">
          <p>Hai, SEKARI!</p>
          <p>SEA adalah sebuah platform aplikasi berbasis website pendukung SEKARI, yang digunakan untuk mengunduh materi, mengerjakan pretest dan postest</p>
      </div>
  </div>
</div>
<section id="slider" class="pt-5">
  <div class="container">
    <h1 class="text-center"><b>Dokumentasi</b></h1>
	  <div class="slider">
				<div class="owl-carousel">
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="{{asset('img/RW36.png')}}" alt="" >
						</div>
						<h5 class="mb-0 text-center text-white"><b>HTML CSS3 Tutorials</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
              <img src="{{asset('img/RW23.png')}}" alt="" >
						</div>
						<h5 class="mb-0 text-center text-white"><b>Wordpress Tutorials</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
              <img src="{{asset('img/RW34.png')}}" alt="" >
						</div>
						<h5 class="mb-0 text-center text-white"><b>PHP MySQL Tutorials</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
              <img src="{{asset('img/RW36.png')}}" alt="" >
						</div>
						<h5 class="mb-0 text-center text-white"><b>Javascript Tutorials</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
              <img src="{{asset('img/RW40.png')}}" alt="" >
						</div>
						<h5 class="mb-0 text-center text-white"><b>Bootstrap Tutorials</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
				</div>
			</div>
  </div>
</section>

<script>
  $(document).ready(function(){
  $(".owl-carousel").owlCarousel({
  	loop:true,
    margin:10,
    nav:true,
	  autoplay:true,
    dots: false,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    center: true,
    navText: [
	    "<i class='fa fa-angle-left text-white'></i>",
	    "<i class='fa fa-angle-right text-white'></i>"
	],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:3
        }
    }
  });
});
</script>
@endsection
