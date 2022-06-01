@if(session()->has('status'))
    <p>{{ session()->get('status')['message'] }}</p>
@endif
