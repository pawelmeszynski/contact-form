<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Your Website</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <h1>Test</h1>
        <form action="{{ route('zapisz') }}" method="POST">
            @csrf
            <input type="email" name="email">
            <button type="submit">Zatwierdz</button>
        </form>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
