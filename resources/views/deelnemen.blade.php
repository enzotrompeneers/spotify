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
		@if(isset($message))
			<div class="row">
				<div class="large-12 columns">
					<h1>Helaas</h1>
					{{ $message}}
				</div>
			</div>
		@else
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
					<form class="form-horizontal" method="GET" action="{{ route('deelnemen.create') }}" data-abide novalidate>
					{{ csrf_field() }}

					<input type="hidden" name="artist1_tracks" value="">
					<input type="hidden" name="artist2_tracks" value="">

					<input type="hidden" name="artist1_id" value="{{ $artists1[0]->id }}">
					<input type="hidden" name="artist2_id" value="{{ $artists2[0]->id }}">

					<div class="box box1 shadow1">
						
						<h3>{{ $artists1[0]->name }}</h3>
						
						<ul data-draggable="artist1_tracks" class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" data-id="{{ $artists1[0]->id }}" >
							
								
								
						</ul>
					</div>

					<div class="box box1 shadow1">
						<h3>Slepen</h3>
						<ul class="droptarget">
							@foreach ($all_tracks_shuffled as $track)
								<li class="track_title" ondragstart="dragStart(event)" draggable="true" data-id="{{ $track->id }}" id="track_{{ $track->id }}">{{ $track->name }}</li>
							@endforeach
						</ul>
						
					</div>

					
					<div class="box box1 shadow1">
						
						<h3>{{ $artists2[0]->name }}</h3>
						
						<ul data-draggable="artist2_tracks" class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" data-id="{{ $artists2[0]->id }}">
							

						</ul>
					</div>

					<div class="small-12 columns">
						<button type="submit" class="btn_spotify">
							Verzenden
						</button>
					</div>
					</form>
				</div>
			@endif
		</div> 
	</div>
    @endif
	
</div>
@stop

<script>

	function dragStart(e) {
        e.dataTransfer.setData("Text", e.target.textContent);
        e.dataTransfer.setData("id", e.target.dataset.id);

		
    }

	function allowDrop(e) {
		e.preventDefault();
	}

	function populateHiddenInputs() {
        var artist1_id = document.getElementsByName('artist1_id')[0].value;
        var artist2_id = document.getElementsByName('artist2_id')[0].value;

        var artist1_tracks = [];
        document.querySelectorAll('[data-draggable="artist1_tracks"] li').forEach(function(li) {
            artist1_tracks.push(li.textContent);
        });
    
        var artist2_tracks = [];
        document.querySelectorAll('[data-draggable="artist2_tracks"] li').forEach(function(li) {
            artist2_tracks.push(li.textContent);
        });

        document.getElementsByName('artist1_tracks')[0].value = JSON.stringify(artist1_tracks);
		document.getElementsByName('artist2_tracks')[0].value = JSON.stringify(artist2_tracks);
	}

    function drop(e) {
		e.preventDefault();

        var targets = ['artist1_tracks', 'artist2_tracks'];
        if(targets.indexOf(e.target.getAttribute('data-draggable')) < 0) return;

		var id = e.dataTransfer.getData("id");
        e.target.appendChild(document.getElementById('track_'+id));
		

        populateHiddenInputs();
    }
	

	
</script>