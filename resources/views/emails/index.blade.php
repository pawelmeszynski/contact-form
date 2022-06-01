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
            <h1>Lista maili</h1>
            <div class="flex flex-col">
                @foreach($emails as $email)
                    <div class="flex bg-gray-100 px-5 py-2 mb-3 items-center justify-between">
                        <p>{{ $email->email }}</p>
                        <div class="flex gap-x-3">
                            <form action="{{ route('emails.destroy', $email->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Usun</button>
                            </form>
                            <a href="{{ route('emails.edit', $email->id) }}">Edytuj</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
