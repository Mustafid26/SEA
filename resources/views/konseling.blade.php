@extends ('layouts.main')

<style>
.konseling-section {
    padding: 40px 20px;
    background-color: #f9f9f9;
    text-align: center;
    overflow: hidden;
}
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
.section-title {
    font-size: 28px;
    margin-bottom: 20px;
}

.konseling-content {
    display: flex;
    flex-direction: row;
    justify-content: center;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.konseling-card {
    background-color: #f5d5d5;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 250px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    margin-bottom: 20px;

    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.8s ease-in-out forwards;
    animation-delay: 0.3s;
}

.konseling-card h3 {
    font-size: 22px;
    margin-bottom: 15px;
}

.konseling-card p {
    font-size: 16px;
    margin-bottom: 20px;
    flex-grow: 1;
}

.btn-kons {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    text-decoration: none;
    border-radius: 10px !important;
    transition: background-color 0.3s ease;; 
}

.btn-whatsapp {
    background-color: #f5d5d5;
    color: black;
}

.btn-whatsapp:hover {
    background-color: #1ebe5a;
    border-radius: 10px !important;
}

.btn-website {
    background-color: #FEE5FD;
    color: black;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.8s ease-in-out forwards;
    animation-delay: 0.3s;
}

.btn-website:hover {
    background-color: #d73696;
    border-radius: 10px !important;
}

.fa-whatsapp, .fa-globe {
    margin-right: 8px;
}

/* Responsive styles */
@media (max-width: 768px) {
    .konseling-content {
        flex-direction: column;
    }

    .section-title {
        font-size: 24px;
    }

    .konseling-card {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
    }
}

@media (min-width: 769px) {
    .konseling-card {
        width: calc(50% - 20px); /* Two cards side by side */
    }
}

@media (max-width: 480px) {
    .section-title {
        font-size: 20px;
    }

    .konseling-card h3 {
        font-size: 18px;
    }

    .konseling-card p {
        font-size: 14px;
    }

    .btn-kons {
        font-size: 14px;
    }
}
.btn-kons:hover{
    color: white !important;
}
</style>

@section ('konten')
<section id="konseling" class="konseling-section" style="background-color: #FEE5FD">
    <div class="container">
        <h2 class="section-title">Konseling Anak dan Perempuan</h2>
        <div class="konseling-content text-wrap">
            <div class="konseling-card">
                <h3 class="text-wrap">Konseling Anak Dan Perempuan</h3>
                <p>Dapatkan layanan konseling untuk anak guna mendukung tumbuh kembang dan kesejahteraan psikologis mereka.</p>
                <a href="https://wa.me/62811274463" target="_blank" class="btn-kons btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i> <span class="konselingwa">Hubungi Sekarang</span>
                </a>
            </div>

            <div class="konseling-card">
                <h3 class="text-wrap">Konseling Keluarga</h3>
                <p>Layanan konseling khusus untuk perempuan yang membutuhkan dukungan mental dan emosional.</p>
                <a href="https://wa.me/62811274463" target="_blank" class="btn-kons btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i> <span class="konselingwa">Hubungi Sekarang</span>
                </a>
            </div>
        </div>

        <div class="more-info">
            <a href="https://dp3akb.jatengprov.go.id/" target="_blank" class="btn-kons btn-website">
                <i class="fa fa-globe"></i> <span class="konselingweb">Kunjungi Website DP3AP2KB Jateng</span>
            </a>
        </div>
    </div>
</section>
@endsection
