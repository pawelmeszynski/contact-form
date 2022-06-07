<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Mail list</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/popup.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div class="container my-20">
            @include('partials.nav')
            @include('partials.request_status')
            <h1 class="font-extrabold text-transparent text-2xl bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">Mail list</h1>
            <div class="flex flex-col images-parent">
                @foreach($emails as $email)
                    <div class="flex bg-gray-100 px-5 py-2 mb-3 items-center justify-between">
                        <a class="image-popup" href="{{ $email->getAvatarUrl() }}">
                            <img src="{{ $email->getAvatarUrl('avatar') }}">
                        </a>
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
        <script>
            $('.images-parent').magnificPopup({
                delegate: 'a.image-popup', // child items selector, by clicking on it popup will open
                type: 'image',
                removalDelay: 300,
                mainClass: 'mfp-with-zoom', // this class is for CSS animation below
                zoom: {
                    enabled: true, // By default it's false, so don't forget to enable it
                    duration: 1500, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function
                    opener: function(openerElement) {
                        // openerElement is the element on which popup was initialized, in this case its <a> tag
                        // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                }
                // other options
            });
        </script>
    </body>
</html>
