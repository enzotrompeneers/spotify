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
			<h1>De wedstrijd is gestart!</h1>
			<p>
				Het is de bedoeling om de juiste nummers bij de juiste artiest te zetten.
				Dit doe je door het nummer te <b>slepen</b> naar het juiste vak van de artiest.
				Succes ermee!
			</p>
		</div>
    	<div class="large-12 columns">
			<div class="wrap">
				<form class="form-horizontal" method="POST" action="{{ route('deelnemer.store') }}" data-abide novalidate>
				{{ csrf_field() }}
				<div class="box box1 shadow1">
					@foreach ($artist1 as $artist)
						<h3>{{ $artist->name }}</h3>
					@endforeach
					<div class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)">
						@foreach ($all_tracks_shuffled as $track)
							<p ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="{{ $track }}">{{ $track }}</p>
						@endforeach

					</div>
				</div>

				<div class="box box5 shadow1">
					@foreach ($artist2 as $artist)
						<h3>{{ $artist->name }}</h3>
					@endforeach
					<div class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)">

					</div>
				</div>

				<div class="small-12 columns">
                    <button type="submit" class="button primary">
                        Opslaan
                    </button>
                </div>

			</div>
		</div> 
	</div>
    @endif
	
</div>
@stop

<script>
	function dragStart(event) {
		event.dataTransfer.setData("Text", event.target.id);
	}

	function allowDrop(event) {
		event.preventDefault();
	}

	function drop(event) {
		event.preventDefault();
		var data = event.dataTransfer.getData("Text");
		event.target.appendChild(document.getElementById(data));
	}
</script>