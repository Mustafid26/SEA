@extends('layouts.main')

@section('reward')
<section class="mt-5 div-hadiah">
    <div class="container d-flex justify-content-between">
        <h1>Hadiah</h1>
        <h1>1000 Coin</h1>
    </div>
    <div class="container container-hadiah">
        <div class="section-hadiah">
        <br />
        <h3>Penawaran Terbaik</h3>
            <div class="card card-top mb-3">
                <img src="img/dummy.png" class="card-img-top" alt="..." />
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit
                    longer.
                </p>
                <p class="card-text">
                    <small class="text-body-secondary"
                    >Last updated 3 mins ago</small
                    >
                </p>
                </div>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card card-slide mb-3">
                    <img
                        src="img/dummy.png"
                        class="card-img-top img-fluid"
                        alt="..."
                        style="width: auto; height: 300px"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                        This is a wider card with supporting text below as a
                        natural lead-in to additional content. This content is a
                        little bit longer.
                        </p>
                        <p class="card-text">
                        <small class="text-body-secondary"
                            >Last updated 3 mins ago</small
                        >
                        </p>
                    </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card card-slide mb-3">
                    <img
                        src="img/dummy.png"
                        class="card-img-top"
                        alt="..."
                        style="width: auto; height: 300px"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                        This is a wider card with supporting text below as a
                        natural lead-in to additional content. This content is a
                        little bit longer.
                        </p>
                        <p class="card-text">
                        <small class="text-body-secondary"
                            >Last updated 3 mins ago</small
                        >
                        </p>
                    </div>
                    </div>
                </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <br>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    });
</script>
@endsection