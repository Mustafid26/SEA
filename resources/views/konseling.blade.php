@extends ('layouts.main')

<style>

.konseling-section {
    padding: 40px 20px;
    background-color: #f9f9f9;
    text-align: center;
}

.section-title {
    font-size: 28px;
    margin-bottom: 20px;
}

.konseling-content {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 30px;
}

.konseling-card {
    background-color: #f5d5d5;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    width: 250px;
}

.konseling-card h3 {
    font-size: 22px;
    margin-bottom: 15px;
}

.konseling-card p {
    font-size: 16px;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-whatsapp {
    background-color: #25d366;
}

.btn-whatsapp:hover {
    background-color: #1ebe5a;
}

.btn-website {
    background-color: #FEE5FD;
}

.btn-website:hover {
    background-color: #d73696;
}

.fa-whatsapp, .fa-globe {
    margin-right: 8px;
}

</style>


@section ('konten')
<section id="konseling" class="konseling-section" style="background-color: #FEE5FD">
    <div class="container">
        <h2 class="section-title">Konseling Anak dan Perempuan</h2>
        <div class="konseling-content">
            <div class="konseling-card">
                <h3>Konseling Anak</h3>
                <p>Dapatkan layanan konseling untuk anak guna mendukung tumbuh kembang dan kesejahteraan psikologis mereka.</p>
                <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-whatsapp">
                    <i class="fa fa-whatsapp"></i> <span >Hubungi via WhatsApp</span>
                </a>
            </div>

            <div class="konseling-card">
                <h3>Konseling Perempuan</h3>
                <p>Layanan konseling khusus untuk perempuan yang membutuhkan dukungan mental dan emosional.</p>
                <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-whatsapp">
                    <i class="fa fa-whatsapp"></i> <span class="konselingwa">Hubungi via WhatsApp</span>
                </a>
            </div>
        </div>

        <div class="more-info">
            <a href="https://dp3akb.jatengprov.go.id/" target="_blank" class="btn btn-website">
                <i class="fa fa-globe"></i> <span class="konselingweb">Kunjungi Website DP3AP2KB Jateng </span>
                </a>
        </div>
    </div>
</section>



@endsection