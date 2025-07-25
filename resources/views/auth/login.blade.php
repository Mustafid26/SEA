<x-guest-layout>
    {{-- Latar belakang utama diubah menjadi pink lembut --}}
    <div class="min-h-screen bg-pink-50 text-gray-900 flex justify-center items-center p-4">
        {{-- Container diperkecil dari max-w-screen-xl menjadi max-w-screen-lg --}}
        <div class="max-w-screen-lg m-0 sm:m-10 bg-white shadow-xl sm:rounded-2xl flex justify-center flex-1">

            <!-- Kolom Form Login -->
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div>
                    {{-- Ganti dengan logo Anda --}}
                    <a href="/">
                        <img src="{{ asset('img/herologo.png') }}" class="w-1/2 mx-auto" alt="Logo">
                    </a>
                </div>
                <div class="mt-8 flex flex-col items-center">
                    <h1 class="text-2xl xl:text-3xl font-extrabold text-center">
                        Selamat Datang!
                    </h1>
                    <p class="text-center text-gray-600 mt-2">Silakan login untuk melanjutkan.</p>

                    <div class="w-full flex-1 mt-8">

                        <!-- Menampilkan Error Validasi -->
                        <x-validation-errors
                            class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg" />

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mx-auto max-w-xs">
                                <!-- Input Nama Pengguna -->
                                <x-input id="name"
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="text" name="name" :value="old('name')" required autofocus
                                    autocomplete="name" placeholder="Nama Pengguna" />

                                <!-- Input Password dengan Tombol Toggle -->
                                <div class="relative mt-5">
                                    <x-input id="password"
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                        type="password" name="password" required autocomplete="current-password"
                                        placeholder="Password" />
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                        <i class="bi bi-eye-slash-fill text-gray-500 cursor-pointer"
                                            id="togglePassword"></i>
                                    </div>
                                </div>

                                <!-- Tombol Login -->
                                <x-button
                                    class="mt-5 tracking-wide font-semibold bg-pink-500 text-gray-100 w-full py-4 rounded-lg hover:bg-pink-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <i class="bi bi-box-arrow-in-right text-xl mr-2"></i>
                                    <span class="ml-3">
                                        {{ __('Log in') }}
                                    </span>
                                </x-button>

                                <p class="mt-6 text-xs text-gray-600 text-center">
                                    Belum punya akun?
                                    <a href="{{ route('register') }}"
                                        class="border-b border-gray-500 font-semibold text-pink-600 hover:text-pink-800">
                                        Daftar di sini
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Kolom Ilustrasi (Hanya tampil di layar besar) -->
            <div class="flex-1 bg-pink-100 text-center hidden lg:flex">
                <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                    style="background-image: url('https://placehold.co/500x500/d73696/white?text=Ilustrasi\nLogin');">
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            if (togglePassword) {
                togglePassword.addEventListener('click', function(e) {
                    // Toggle tipe atribut input
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);

                    // Ganti ikon mata
                    this.classList.toggle('bi-eye-slash-fill');
                    this.classList.toggle('bi-eye-fill');
                });
            }
        });
    </script>
@endpush
