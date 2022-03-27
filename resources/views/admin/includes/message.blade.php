@if(Session::has('message'))
<div class="alert mb-3 alert-{{ Session::get('message.type') }}">{{ Session::get('message.text') }}</div>
@endif