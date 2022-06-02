@if(session()->has('status'))
    <p class="text-pink-600 text-2xl text-center border-2">{{ session()->get('status')['message'] }}</p>
@endif
