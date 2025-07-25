@extends('layouts.main')

@section('konten')
    <div class="container py-5">
        {{-- Panggil komponen Livewire di sini --}}
        @livewire('artikel-index')

        {{-- Pesan Informasi --}}
    </div>
@endsection
