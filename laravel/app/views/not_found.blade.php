@extends('layout')

@section('content')
    <p>404: Page not found – the page <strong>{{ url($_SERVER['REQUEST_URI']) }}</strong> does not exist.</p>
    <p>If you typed in or copied/pasted this URL, make sure you included all the characters, with no extra punctuation.</p>
@stop