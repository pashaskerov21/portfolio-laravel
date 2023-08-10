<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->title }}</title>
    <link rel="icon" href="{{ asset('uploads/settings/images/' . $settings->favicon) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3cf65b98ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('front-assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/main.css') }}">
</head>

<body>

    <button class="page-scroll-button d-none"><i class="fa-solid fa-arrow-up"></i></button>
    @if (session('email-success'))
        <div class="mail-toast">
            <span>{{session('email-success')}}</span>
            <button><i class="fa-solid fa-xmark"></i></button>
        </div>
    @endif
