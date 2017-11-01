@extends('layouts.master')

@section('content')
@include('partials.carousel')


<hr>
@if (Auth::user())
    @if (Auth::user()->email == $admin[0])
        <div class="row">
            <div class="large-12.columns">
                <h2>Admin</h2>
                <form class="form-horizontal" method="POST" action="{{ route('admin.update') }}" data-abide novalidate>
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="small-12 columns{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>Wedstrijdverantwoordelijke <small>Wijzigen</small>
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
                            
                            </label>
                        </div>
                    </div>

                    </div>
                    <div class="row">
                        <div class="small-12 columns">
                            <button type="submit" class="btn_spotify ">
                                Wijzigen
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
    @endif
@endif

<div class="row">
    <div class="large-12.columns">
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