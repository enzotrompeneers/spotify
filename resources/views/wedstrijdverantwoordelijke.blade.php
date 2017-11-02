
@extends('layouts.master')

@section('content')
@if (Auth::user())
    @if (Auth::user()->email == $admin_email)
    <form class="form-horizontal" method="POST" action="{{ route('wedstrijdverantwoordelijke.update') }}" data-abide novalidate enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <div class="row">
            <div class="small-12 columns{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="call_to_action_wrapper">
                    <h1>Wedstrijdverantwoordelijke</h1>
                        <input type="text" placeholder="naam@email.com" pattern="email" name="email" value="{{ $admin[0] }}">
                        @if ($errors->has('email'))
                            <strong>{{ $errors->first('email') }}</strong>
                        @endif
                        <small class="error">Geef een geldig e-mail adres</small>

                        @if(isset($email_exist))
                            @if(!$email_exist)
                                <div data-alert class="alert-box alert round">
                                    Wedstrijdverantwoordelijke is niet geregistreerd (niet gevonden).
                                    <a href="#" class="close">&times;</a>
                                </div>
                            @endif
                        @endif
                    <button type="submit" class="btn_spotify ">
                        Wijzigen
                    </button>
                </div>
            </div>
        </div>
    </form>
    @else
     <div class="row">
        <div class="large-12.columns">
            <h1>Je bent geen administrator</h1>
            <a class="btn_spotify" href="{{ route('home') }}">Ga terug naar home</a>
            <br><br><br>
        </div>
    </div>
    @endif
@else
    <div class="row">
        <div class="large-12.columns">
            <h1>Je bent geen administrator</h1>
            <a class="btn_spotify" href="{{ route('home') }}">Ga terug naar home</a>
            <br><br><br>
        </div>
    </div>
@endif
@stop