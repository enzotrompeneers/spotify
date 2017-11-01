
@extends('layouts.master')

@section('content')
@if (Auth::user())
    @if (Auth::user()->email == $admin_email)

        <div class="row">
            <div class="large-12.columns">
                <div class="row">
                    <div class="large-12.columns">
                        <h2>Wedstrijddatums Tonen</h2>
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
                        <h2>Wedstrijddatum Aanmaken</h2>
                    </div>
                </div>
                <form action="{{ route('datum.create') }}" method="post">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="large-3 columns">
                            <div class="form-group">
                                <label for="start_date">Start Datum</label>
                                <input type="datetime" id="start_date" name="start_date" placeholder="yyyy-mm-dd">
                            </div>
                        </div>

                        <div class="large-3 columns">
                            <div class="form-group">
                                <label for="start_hour">Start uur</label>
                                <input type="datetime" id="start_hour" name="start_hour" placeholder="Start uur" value="12:00">
                            </div>
                        </div>

                        <div class="large-3 columns">
                            <div class="form-group">
                                <label for="to">Einde Datum</label>
                                <input type="datetime" id="end_date" name="end_date" placeholder="yyyy-mm-dd">
                            </div>
                        </div>

                        <div class="large-3 columns">
                            <div class="form-group">
                                <label for="end_hour">Einde uur</label>
                                <input type="datetime" id="end_hour" name="end_hour" placeholder="Einde uur" value="24:00">
                            </div>
                        </div>
                        <div class="large-12 columns">
                            <button type="submit" class="btn_spotify ">
                                Aanmaken
                            </button>
                        </div>
                    </div>
                </form>
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
