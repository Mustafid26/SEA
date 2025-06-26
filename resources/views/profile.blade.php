@extends('layouts.main')

@section('konten')
    <style>
        body {
            font-family: 'Maven Pro';
        }

        .profile-container {
            margin-top: 20px;
        }

        .profile-header {
            display: flex;
            align-items: center;
        }

        .profile-header .back-arrow {
            font-size: 24px;
            text-decoration: none;
            color: #333;
            margin-right: 10px;
        }

        .profile-info {
            margin-top: 20px;
        }

        .profile-picture {
            position: relative;
            display: inline-block;
        }

        .profile-picture img {
            border-radius: 50%;

        }

        .edit-icon button {
            position: absolute;
            bottom: 0;
            margin-left: 50px;
            background-color: #D6D6D6;
            border-radius: 50%;
            padding: 3px;
            align-items: center;
            transition: transform 0.5 ease;
        }

        .edit-icon button:hover {
            background-color: #b8b8b8;
            transform: scale(1.2);
        }

        .profile-info h4 {
            margin-top: 10px;
        }

        .profile-points {
            margin-top: 10px;
        }

        .profile-options {
            margin-top: 20px;
        }

        .profile-options .btn {
            margin-bottom: 10px;
            width: 100%;
        }

        .logout-button {
            margin-top: 20px;
            background-color: #d73696;
            border-radius: 15px 15px 15px 15px;
            padding: 15px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logout-button:hover {
            transform: scale(0.98);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
        }

        .logout-button:active {
            transform: scale(0.95);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .btn-profile {
            border-radius: 15px 15px 15px 15px;
            padding: 25px;
            background-color: #54bab825;
            display: block;
        }

        .text-profile {
            color: #d73696;
        }

        .icon-profile {
            margin-right: 5px;
        }

        .btn-profile:hover {
            background-color: white;
        }

        .btn-coin:hover {
            color: black;
        }

        .btn-logout:hover {
            color: white;
        }

        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

    <div class="container">
        <div class="profile-container">
            <div class="profile-header align-items-center">
                <h3 style="color: #d73696;"><strong>Profil</strong></h3>
            </div>
            <div class="profile-info text-center">
                <div class="profile-picture">
                    @if (Auth::user()->profile_photo_path)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile Photo"
                            style="width: 250px;height: 250px;">
                    @else
                        <img src="{{ asset('img/profile.png') }}" alt="Profile Picture"
                            style="width: 250px;height: 250px;" />
                    @endif
                    <div class="edit-icon">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('img/pencil.png') }}" alt="Edit Icon" style=" width: 30px;" />
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Silahkan Upload Gambar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('profile.upload') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02"
                                                name="profile_photo">
                                            <label class="input-group-text" for="inputGroupFile02">Unggah
                                                Gambar</label>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <h4><strong>{{ $user->ID_Sekari }}</strong></h4> --}}
                <h4><strong>{{ $user->nama_lengkap }}</strong></h4>
                {{-- <h4><strong>{{ $user->rombel }}</strong></h4> --}}
                @if (Auth::user()->profile_photo_path)
                    <form action="{{ route('profile.delete') }}" method="POST" style="margin-top: 20px;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Hapus Gambar</button>
                    </form>
                @endif
            </div>
            <div class="profile-options">
                <!-- Modal -->
                <a href="/user/profile" style="text-decoration: none;">
                    <button class="btn-profile btn btn-outline-secondary btn-block" style="text-align: left;">
                        <span class="text-profile"><i class="fa fa-solid fa-gear fa-2xl icon-profile"
                                style="color: #d73696;"></i>Pengaturan</span>
                    </button>
                </a>
                <a href="https://instagram.com/ppko_hmtiudinus" style="text-decoration: none;">
                    <button class=" btn-profile btn btn-outline-secondary btn-block" style="text-align: left;">
                        <span class="text-profile"><i class="fa fa-solid fa-phone fa-2xl icon-profile"
                                style="color: #d73696;"></i>Hubungi Kami</span>
                    </button>
                </a>

            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
              this.closest('form').submit();" class="btn-logout">
                    <div class="logout-button text-center mb-5">
                        <button class="btn btn-primary text-white">Keluar</button>
                    </div>
                </a>
            </form>
        </div>
    </div>
@endsection
