<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Your Website</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container my-20">
            @include('partials.nav')
            <h1 class="font-extrabold text-transparent text-2xl bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600 mb-3" >Add email below</h1>
            <form action="{{ route('emails.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="text-2xl" for="email">E-mail:</label>
                <input class="border-2 border-solid border-emerald-700" type="email" id="email" name="email" placeholder="test@test.com"><br>
                @error('email')
                <p>{{ $message }}</p>
                @enderror
                <input class="border-2 border-solid border-emerald-700" type="file" name="avatar">
                @error('avatar')
                <p>{{ $message }}</p>
                @enderror



                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Confirm</button>
                @dd($errors);
            </form>
        </div>
    </body>
</html>
