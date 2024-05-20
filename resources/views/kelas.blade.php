@extends('layouts.main')

@section('content')
<div class="container">
    @yield('button')
    <div class="row">
        <div id="content">
            <div id="content" class="p-3 bg-white border rounded shadow-lg">
                <h3>Silahkan Pilih Materi</h3>
            </div>
        </div>
    </div>
</div>
@endsection

@section('button')
<div class="d-flex justify-content-center mb-4 wow fadeInUp">
    <div class="btn-group btn-group-custom" role="group">
        @foreach($kelas as $kelass)
        <button type="button" class="btn btn-outline-secondary" onclick="setActive(this, {{ $kelass->id }}, '{{ $kelass->nama_kelas }}')">{{ $kelass->nama_kelas }}</button>
        @endforeach
    </div>
</div>
@endsection

@section('kosong')
<div class="container d-flex justify-content-center wow fadeInUp">
    <img id="buipahimg" src="img/BuIpah.png" alt="Bu Ipah" style="width:50vh; display:none;">
    <img id="buseptiimg" src="img/BuSepti.png" alt="Bu Septi" style="width:50vh; display:none;">
    <img id="buediimg" src="img/BuEdi.png" alt="Bu Edi" style="width:50vh; display:none;">
    <img id="bucahyaimg" src="img/BuCahya.png" alt="Bu Cahya" style="width:50vh; display:none;">
    <img id="buperiimg" src="img/BuPeri.png" alt="Bu Peri" style="width:50vh; display:none;">
    <img id="buasihimg" src="img/BuAsih.png" alt="Bu Peri" style="width:50vh; display:none;">
</div>
@endsection

@section('sidebar')
<div id="sidebar" class="d-flex flex-column shadow-lg">
    <div class="header">
        <h4 style="display: inline; margin-right: 5px;"><i class="fa-regular fa-pen-to-square fa-xl" style="display: inline;"></i> Materi Belajar</h4>
    </div>
    <div id="materi-content">
        <!-- Materi akan diisi di sini dengan JavaScript -->
    </div>
</div>
@endsection

<script>
    // Data kelas dan materi diambil dari PHP ke JavaScript
    const kelasData = @json($kelas);
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll('.btn-outline-secondary');
        buttons.forEach(btn => btn.classList.remove('active'));

        const defaultButton = document.querySelector('.btn.btn-outline-secondary');
        defaultButton.classList.add('active');
        setActive(defaultButton, 1);

        const buIpahImage = document.getElementById('buipahimg');
        buIpahImage.style.display = 'block';
    });
    function setActive(button, kelasId, namaKelas) {
        console.log("setActive called with kelasId:", kelasId);
        const materiContentDiv = document.getElementById('materi-content');
        const kelas = kelasData.find(kls => kls.id === kelasId);

        //Materi
        if (kelas) {
            let html = `<ul class="nav nav-pills flex-column mb-auto" id="materiList">`;
            kelas.materi.forEach(materi => {
                html += `
                <li class="nav-item">
                    <a href="#" class="nav-link tombolmateri" aria-current="page" onclick="showPreview(event, '${kelas.nama_kelas}', '${materi.judul_materi}', '${materi.link_grup}')">
                        ${materi.judul_materi}
                    </a>
                </li>`;
            });
            html += `</ul>`;
            materiContentDiv.innerHTML = html;
        }
        const navLinks = document.querySelectorAll('.tombolmateri');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navLinks.forEach(navLink => {
                    navLink.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
        //Button Active
        const buttons = document.querySelectorAll('.btn-outline-secondary');
        buttons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        //Gambar Kelas
        const imageMap = {
            'Bu Ipah': 'buipahimg',
            'Bu Septi': 'buseptiimg',
            'Bu Edi': 'buediimg',
            'Bu Cahya': 'bucahyaimg',
            'Bu Peri': 'buperiimg',
            'Bu Asih' : 'buasihimg'
        };
      
        Object.values(imageMap).forEach(imgId => {
            document.getElementById(imgId).style.display = 'none';
        });
  
        const imgIdToShow = imageMap[namaKelas];
        if (imgIdToShow) {
            document.getElementById(imgIdToShow).style.display = 'block';
        }
    }

    function showPreview(event, kelas, materi, link_grup) {
        event.preventDefault();
        console.log("showPreview called with kelas:", kelas, "materi:", materi);
        document.getElementById('content').innerHTML = `
        <div id="content" class="bg-white shadow-lg">
            <div class="header-materi">
                <h3 style="display: inline;"><i class="fa-solid fa-book fa-xl" style="display: inline;""></i> ${kelas} - ${materi}</h3>
            </div>
            <div class="content-materi p-3">
                <p>Content for ${kelas} - ${materi}</p>
            </div>
            <div class="sub">
                <img class="icon" src="img/CameraVideo.png" alt="Ikon">
                <div class="text"><strong>Media Pembelajaran</strong></div>
            </div>
            <div class="content-materi p-3">
                <p>
                    <img src="img/LogoWA.png" alt="" srcset=""><strong>Link Grup Whatsapp</strong> : <a href="${link_grup}" target="_blank">${link_grup}</a>
                </p>
            </div>
            <div class="sub">
                <img class="icon" src="img/LogoPresensi.png" alt="Ikon">
                <div class="text"><strong>Presensi Kehadiran</strong></div>
            </div>
            <div class="content-materi p-3">
                <p>
                    <img src="img/LogoWA.png" alt="" srcset=""><strong>Link Grup Whatsapp</strong> : <a href="${link_grup}" target="_blank">${link_grup}</a>
                </p>
            </div>
        </div>`;
    }
</script>
