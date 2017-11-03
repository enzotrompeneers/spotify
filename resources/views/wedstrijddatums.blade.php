
@extends('layouts.master')

@section('content')
@if (Auth::user())
    @if (Auth::user()->email == $admin_email)
        <div class="row">
            <div class="large-12 columns">
                <h1>Wedstrijddatums Tonen</h1>
                <table class="datum_table">
                    <tr class="datum_table">
                        <th>id</th>
                        <th>Start Datum</th>
                        <th>Einde Datum</th>
                    </tr>
                    @foreach($contests as $contest) 
                        <tr class="datum_table">
                            <td>{{ $contest->id }}</td>
                            <td>{{ $contest->startDate }}</td>
                            <td>{{ $contest->endDate }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <h1>Wedstrijddatum Aanmaken</h1>
            </div>
        </div>
        <form action="{{ route('datum.store') }}" method="POST">
        {{ csrf_field() }}
            <div class="row">
                <div class="large-3 columns">
                    <div class="form-group">
                        <label for="startDate">Start Datum</label>
                        <input type="date" id="startDate" name="startDate" placeholder="yyyy-mm-dd">
                    </div>
                </div>

                <div class="large-3 columns">
                    <div class="form-group">
                        <label for="startHour">Start uur</label>
                        <input type="time" id="startHour" name="startHour" placeholder="Start uur" value="12:00">
                    </div>
                </div>

                <div class="large-3 columns">
                    <div class="form-group">
                        <label for="endDate">Einde Datum</label>
                        <input type="date" id="endDate" name="endDate" placeholder="yyyy-mm-dd">
                    </div>
                </div>

                <div class="large-3 columns">
                    <div class="form-group">
                        <label for="endHour">Einde uur</label>
                        <input type="time" id="endHour" name="endHour" placeholder="Einde uur" value="23:59">
                    </div>
                </div>
                <div class="large-12 columns">
                    <button type="submit" class="btn_spotify ">
                        Aanmaken
                    </button>
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
