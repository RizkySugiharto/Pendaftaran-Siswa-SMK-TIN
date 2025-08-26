<!DOCTYPE html>
<html lang="en" id="formphp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    @vite(["resources/css/style.css"])
    <link rel="shortcut icon" href="{{ asset('images/icon-white.png ') }}" type="image/x-icon">

</head>
<div class="navvy">
    <a href="{{ asset('') }}">
        <img src="{{ asset('images/logo-white.png') }}" alt="logo-smk-tin">
    </a>

    <div class="links">
        <a href="{{route('index')}}">Home</a>
        <a href="{{route('candidates.create')}}">Form</a>
        <a href="{{route('candidates.leaderboard')}}">Leaderboard</a>
    </div>
</div>

<body>