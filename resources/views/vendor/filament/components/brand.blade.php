@if (request()->is('admin/login'))
    <img src="{{ asset('img/logoseratcut.webp') }}" alt="Logo" class="h-14">
@else
    <img src="{{ asset('img/logoseratcut.webp') }}" alt="Logo" class="h-10">
@endif
