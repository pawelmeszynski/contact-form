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
            @include('partials.request_status')
            <h1>Edytuj mail {{ $email->email }}</h1>
            <form action="{{ route('emails.update', $email->id) }}" method="POST">
                @csrf
                @method('patch')
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="{{ $email->email }}">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
                <button type="submit">Zatwierdz</button>
            </form>
        </div>
    </body>
</html>
