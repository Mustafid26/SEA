@extends('layouts.main')

@section('konten')
<div class="container text-center mt-5 fadeinUp">
	<img src="{{ asset('img/SEA.png') }}" alt="SEA Logo" class="logo w-100">
	<div class="card mt-4">
		<div class="card-header bg-teal text-white">
			<h3 style="color: white;">Apa Itu SEA?</h3>
		</div>
		<div class="card-body">
			<p>Hai, SEKARI!</p>
			<p>SEA adalah sebuah platform aplikasi berbasis website pendukung SEKARI, yang digunakan untuk mengunduh
				materi, mengerjakan pretest dan postest. Serta bisa mendapatkan sekari points untuk ditukarkan berbagai hadiah khusus siswa SEKARI</p>
		</div>
	</div>
</div>
<section id="slider" class="pt-5">
	<div class="container">
		<h1 class="text-center"><b>Dokumentasi</b></h1>
		<div class="slider">
			<div class="owl-carousel">
				@foreach ($photos as $p)
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img style="max-height: 350px;" src="{{ asset('storage/' . $p->image) }}" loading="lazy" />
						</div>
						<h5 class="mb-0 text-center text-white">{{ $p->title }}</b></h5>
						<p class="text-center p-4">{{ $p->desc }}</p>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$(".owl-carousel").owlCarousel({
			loop: true,
			margin: 10,
			nav: true,
			autoplay: true,
			dots: false,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			center: true,
			navText: [
				"<i class='fa fa-angle-left text-white'></i>",
				"<i class='fa fa-angle-right text-white'></i>"
			],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				1000: {
					items: 3
				}
			}
		});
	});
</script>
@endsection
