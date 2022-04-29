<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Your Website</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <h1>Test</h1>
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email">
            @error('email')
                <p>{{ $message }}</p>
            @enderror
            <button type="submit">Zatwierdz</button>
        </form>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
