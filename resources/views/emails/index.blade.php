<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Your Website</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container my-20">
            @include('partials.nav')
            @include('partials.request_status')
            <h1 class="font-extrabold text-transparent text-2xl bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">Mail list</h1>
            <div class="flex flex-col">
                @foreach($emails as $email)
                    <div class="flex bg-gray-100 px-5 py-2 mb-3 items-center justify-between">
                        <img class="w-25 h-10" src="{{ $email->getAvatarUrl() }}">
                        <p class="text-xl text-pink-600 ">{{ $email->email }}</p>
                        <div class="flex gap-x-3">
                            <form action="{{ route('emails.destroy', $email->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit"><i class="bi bi-trash"></i></button>
                            </form>
                            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="{{ route('emails.edit', $email->id) }}"><i class="bi bi-pencil-square"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
