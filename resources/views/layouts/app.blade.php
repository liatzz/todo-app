<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Menentukan judul halaman, jika tidak ada variabel $title maka menggunakan 'Default Title' -->
    <title>{{ $title ?? 'Default Title' }} - {{ config('app.name') }}</title>

    <!-- Import file CSS Bootstrap dari dalam project -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}">

    <!-- Import Bootstrap versi 5.3 dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Menyertakan navbar dari file partials/navbar.blade.php -->
    @include('partials.navbar')

    <!-- Bagian utama halaman yang akan diisi oleh halaman lain -->
    @yield('content')

    <!-- Menyertakan modal jika ada -->
    @include('partials.modal')

    <!-- Menyertakan footer dari file partials/footer.blade.php -->
    @include('partials.footer')

    <!-- Import file JavaScript dari dalam project -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- Import Bootstrap JS -->
    <!-- Bootstrap JS (Versi Terbaru) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
