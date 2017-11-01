@extends('layouts.master')

@section('content')
@include('partials.carousel')

<hr>
@if (Auth::user())
    @if (Auth::user()->email == $admin[0])
        <div class="row">
            <div class="large-4 columns">
                <h2>Admin</h2>
                @include('partials.wedstrijdverantwoordelijke');

                <a class="btn_spotify" href="{{ route('datum.show') }}">Toon Wedstrijddatums</a>
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
        <h2>De Winnaars</h2>
        <ul>
            <li>Periode 1: test</li>
            <li>Periode 2: test</li>
            <li>Periode 3: test</li>
            <li>Periode 4: test</li>
        </ul>
    </div>
</div>
@stop