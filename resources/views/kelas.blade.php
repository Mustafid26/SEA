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
