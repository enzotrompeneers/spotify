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

@if($participants)
    <div class="row">
        <div class="large-12 columns">
            <h1>Highscore - Top 10 van de lopende wedstrijd</h1>
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
    </div>
@endif

<div class="row">
    <div class="large-12 columns">
        <h1>De Winnaars</h1>
        <ul>
            <li>Periode 1: test</li>
            <li>Periode 2: test</li>
            <li>Periode 3: test</li>
            <li>Periode 4: test</li>
        </ul>
    </div>
</div>

@stop