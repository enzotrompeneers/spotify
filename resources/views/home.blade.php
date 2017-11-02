@extends('layouts.master')

@section('content')
@include('partials.carousel')

<hr>
@if (Auth::user())
    @if (Auth::user()->email == $admin[0])
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

<div class="row">
    <div class="large-4 columns">
        @if(isset($succes_message))
            <div data-alert class="alert-box success round">
                {{ $succes_message }}
                <a href="#" class="close">&times;</a>
            </div>
        @endif
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