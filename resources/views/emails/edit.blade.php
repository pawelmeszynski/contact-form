<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Mail editor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icongits.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}">
</head>
<body>
<div class="container my-20">
    @include('partials.nav')
    @include('partials.request_status')
    <h1 class="text-2xl text-center border-2 bg-gray-100">YOU WANT TO EDIT: {{ $email->email }}</h1>
    <form action="{{ route('emails.update', $email->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="flex bg-gray-100 px-5 py-2 mb-5 mt-2 space-x-10">
            <label class="text-xl mt-2 px-1" for="email">E-mail:</label>
            <input class="w-96 h-10" type="email" id="email" name="email" value="{{ $email->email }}">
            <input type="hidden" name="email_id" value="here give me id of edited email">
            @error('email')
            <p> {{ $message }} </p>
            @enderror
            <input class="border-2 border-solid border-emerald-700" type="file" name="avatar">
            <a class="image-popup" href="{{ $email->getAvatarUrl() }}">
                <img src="{{ $email->getAvatarUrl('avatar') }}" alt="avatar">
            </a>
            @error('avatar')
            <p>{{ $message }}</p>
            @enderror
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 p-2 rounded-full" type="submit">
                EDIT
            </button>
        </div>
    </form>
</div>
</body>
</html>
