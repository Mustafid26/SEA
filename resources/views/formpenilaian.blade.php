@extends('layouts.main')

@section('konten')
@php
    $existingSubmit = \App\Models\Submit::where('user_id', auth()->user()->id)->first();
@endphp

<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<style>
    trix-toolbar [data-trix-button-group="file-tools"] 
        {
            display: none;
        }
</style>
<div class="container">
    <div class="container-parent fadeinUp vh-100" style="margin-bottom: 10rem;">
        <div class="container-child">
            <div class="video-container">
                <img src="{{asset('img/SEKARI.png')}}" alt="" class="img-fluid" style="max-width: 60%;">
            </div>
            <div class="content-materi-after">
                <h2>Silahkan Masukkan Link Di Bawah Ini : </h2>
                <div class="textarea">
                    @if(!$existingSubmit)
                        <form action="{{ route('submit.penilaian') }}" method="post">
                            @csrf
                            <input id="body" type="hidden" name="body" value="">
                            <trix-editor input="body"></trix-editor>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button> 
                        </form>
                    @else
                        <p>Anda sudah mengirimkan penilaian. Terima kasih!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endsection