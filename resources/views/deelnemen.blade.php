@extends('layouts.master')

@section('content')

	@if ($user = Auth::guest()) 
	<div class="row">
		<div class="small-8 large-centered columns">
			<h1>Je kan nog niet deelnemen</h1>
	  		<p>
	  			Om te kunnen deelnemen moet je <a href="{{ route('login') }}">Inloggen</a><br>
	  			Nog geen account? Registreer hier: <a href="{{ route('register') }}">Registreren</a>
	  		</p>
	 	</div>
	</div>
    @endif

    @if ($user = Auth::user()) 
    <div class="row">
    	<div class="large-12 columns">
			<h1>Deelname gestart</h1>
		</div>
	</div>
	
	<div class="row">
    	<div class="large-4 columns">
			<img src="https://placehold.it/400x300&text=[img]" />
			<h4>This is a content section.</h4>
			<p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
		</div>
		<div class="large-4 columns">
			<img src="https://placehold.it/400x300&text=[img]" />
			<h4>This is a content section.</h4>
			<p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
		</div>
		<div class="large-4 columns">
			<img src="https://placehold.it/400x300&text=[img]" />
			<h4>This is a content section.</h4>
			<p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
		</div>
    @endif
	
</div>
@stop