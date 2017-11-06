@extends('layouts.master')

@section('content')
@include('partials.carousel')

<hr>
@if (Auth::user())
    @if (Auth::user()->email == $admin_email)
        <div class="row">
            <div class="large-12 columns">
                <h1>Admin</h1>
                <a class="btn_spotify" href="{{ route('wedstrijdverantwoordelijke.index') }}">Toon Wedstrijdverantwoordelijke</a>
                <a class="btn_spotify" href="{{ route('datum.index') }}">Toon Wedstrijddatums</a>
            </div>
        </div>
        <hr>
    @endif
@endif
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
            @if(isset($participants))
                <h1>Highscore van de lopende wedstrijd</h1>
                <ul>
                    @foreach($participants as $participant)
                        <li>Punten: {{ $participant['points'] }}, User_id: {{ $participant['user_id'] }} </li>
                    @endforeach
                <ul>
            @endif
        </div>
    </div>
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