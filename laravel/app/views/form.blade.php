@extends('layout')

@section('content')
    
    {{ Form::open(array('action' => 'HomeController@generateHash', 'class'=>"form-signin", 'id'=>"url_form_id")) }}
    	
    	<h2 class="form-signin-heading">Enter URL</h2>
    	
    	{{ Form::text('url', null, array('class'=>"input-block-level required"))  }}

    	{{ Form::submit('Shorten »', array('class'=>"btn btn-large btn-primary"))  }}


    {{ Form::close() }}

    <blockquote>
	  <p id="hashed_url"></p>
	</blockquote>
@stop