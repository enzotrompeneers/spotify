@extends('layouts.master')

@section('content')
@include('partials.carousel')

@if(isset($succes_message))
    <div class="row">
        <div class="large-4 columns">
            <div data-alert class="alert-box success round">
                {{ $succes_message }}
                <a href="#" class="close">&times;</a>
            </div>
        </div>
    </div>
@endif

@if(Session::has('participationOver'))
    <div class="row">
        <div class="large-8 columns">
            <div data-alert class="alert-box success round">
                {{ Session::get('participationOver') }}
                <a href="#" class="close">&times;</a>
            </div>
        </div>
    </div>
@endif

<div class="row">
    <div class="large-12 columns">
        <h1>Wedstrijd</h1>
        <p>
            Doe mee aan onze wedstrijd. Je kan een maand gratis Spotify Premium winnen! Wat is de bedoeling van het spel? 
            Probeer de juiste nummers bij de artiest te zetten. Je kan het spel blijven spelen tot de wedstrijd afgelopen is.
            Telkens je het spel speelt wordt jou totaal punten gewijzigd. Bij elk goed antwoord krijg je een punt.
            Let wel op dat bij elk fout antwoord er ook een punt af gaat!  <a href="{{ route('deelnemen.index') }}">Start Wedstrijd!</a>
        </p>
    </div>
</div>

@if($participants)
    <div class="row">
        <div class="large-6 columns">
            <h1>Huidige Highscore - Top 10</h1>
        </div>
        <div class="large-6 columns">
            <h1>Winnaars vorige wedstrijden</h1>
        </div>
    </div>
    <div class="row">
        <div class="large-6 columns">
            <table class="datum_table">
                <tr class="datum_table">
                    <th>Rank</th>
                    <th>Naam</th>
                    <th>Punten</th>
                </tr>

                <?php $n = 0; ?>
                @foreach($participants as $participant) 
                    <tr>
                        <?php $n++; ?>
                        <td>{{ $n }}</td>
                        <td>{{ $participant->user->name }}</td>
                        <td>{{ $participant->points }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    
@endif
@if($winners)
    
        <div class="large-6 columns">
            <table class="datum_table">
                <tr class="datum_table">
                    <th>Contest ID</th>
                    <th>Naam</th>
                    <th>Punten</th>
                </tr>
                    <?php $n = 0; ?>
                @foreach($winners as $winner) 
                    <tr>
                        <?php $n++; ?>
                        <td>{{ $winner->contest_id }}</td>
                        <td>{{ $winner->user->name }}</td>
                        <td>{{ $participant->points }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endif

@stop