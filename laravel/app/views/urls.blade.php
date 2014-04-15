@extends('layout')

@section('content')
    @foreach($urls as $urls)
        <p>{{ $urls->url_hash }}  -  {{ $urls->actual_url }}</p>
    @endforeach
@stop