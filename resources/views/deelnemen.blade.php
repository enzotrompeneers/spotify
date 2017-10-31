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
				Dit doe je door de nummers te <b>slepen</b> naar het juiste vak van de artiest.
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
					<div data-draggable="target" class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" name="{{ $artist1[0]->name }}">
						<ul>
							@foreach ($all_tracks_shuffled as $track)
								<li class="track_title" ondragstart="dragStart(event)" draggable="true" id="{{ $track }}" name="{{ $track }}">{{ $track }}</li>
							@endforeach
							
						</ul>
					</div>
				</div>

				<div class="box box1 shadow1">
					@foreach ($artist2 as $artist)
						<h3>{{ $artist->name }}</h3>
					@endforeach
					<div data-draggable="target" class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" name="{{ $artist2[0]->name }}">
						<ul>

						</ul>
					</div>
				</div>

				<div class="small-12 columns">
                    <button type="submit" class="btn_spotify">
                        Verzenden
                    </button>
                </div>

			</div>
		</div> 
	</div>
    @endif
	
</div>
@stop

<script>
	function dragStart(e) {
		e.dataTransfer.setData("Text", event.target.id);
	}

	function allowDrop(e) {
		e.preventDefault();
	}

	function drop(e) {
		if(e.target.getAttribute('data-draggable') == 'target') {
		e.preventDefault();
		var data = e.dataTransfer.getData("Text");
		e.target.appendChild(document.getElementById(data));
		}
	}

	
</script>