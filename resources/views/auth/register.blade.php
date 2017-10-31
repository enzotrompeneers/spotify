@extends('layouts.master')

@section('content')

@section('content')
<div class="row">
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}" data-abide novalidate>
            {{ csrf_field() }}

            <div class="row">
                <div class="small-12 columns">
                    <h1>Registreren</h1>
                </div>

                <div class="small-6 columns{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label>Naam <small>Verplicht</small>
                    <input type="text" placeholder="Naam" required pattern="[a-zA-Z\s]+" name="name" value="{{ old('name') }}" >
                    <small class="error">Geef je naam!</small>
                    </label>
                </div>

                <div class="small-6 columns{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>E-mail <small>Verplicht</small>
                    <input type="text" placeholder="naam@email.com" required pattern="email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <strong>{{ $errors->first('email') }}</strong>
                    @endif
                    <small class="error">Geef een geldig e-mail adres</small>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="small-6 columns">
                    <label>Wachtwoord <small>Verplicht</small>
                    <input type="password" id="password" placeholder="Wachtwoord" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" name="password">
                    <small class="error">Wachtwoord moet Minimaal 6 karakters, Minstens 1 letter en 1 nummer hebben!</small>
                    </label>
                </div>

                <div class="small-6 columns">
                    <label>Bevestig Wachtwoord <small>Verplicht</small>
                    <input type="password" placeholder="Herhaal Wachtwoord" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" name="password_confirmation" data-equalto="password">
                    <small class="error">Wachtwoord is niet hetzelfde!</small>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="small-6 columns">
                    <label>Straat en huisnummer <small>Verplicht</small>
                    <input type="text" placeholder="straat en huisnummer" required pattern="[a-zA-Z0-9\s]+" name="address" value="{{ old('address') }}">
                    <small class="error">Geef je straat en huisnummer!</small>
                    </label>
                </div>

                <div class="small-6 columns">
                    <label>Stad <small>Verplicht</small>
                    <input type="text" placeholder="Stad"  required pattern="[a-zA-Z\s]+" name="city" value="{{ old('city') }}">
                    <small class="error">Geef de naam van je stad!</small>
                    </label>
                </div>
            </div>

            </div>
            <div class="row">
                <div class="small-12 columns">
                    <button type="submit" class="btn_spotify ">
                        Registreren
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
