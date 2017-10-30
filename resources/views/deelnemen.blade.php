@extends('layouts.master')

@section('content')
<div class="row">
	<div class="large-12 columns">
		<h1>Deelnemen</h1>
		@if ($user = Auth::guest()) 
			<p>
				U kan nog niet deelnemen aan het spel. <br>
            	Gelieve eerst in te loggen: <a href="{{ route('login') }}">Inloggen</a><br>
            	Heb je nog geen account? Registreer hier: <a href="{{ route('register') }}">Registreren</a>
            </p>
        @else
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
	
</div>
@stop