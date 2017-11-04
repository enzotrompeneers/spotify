@extends('layouts.master')

@section('content')
@if (Auth::user())
    @if (Auth::user()->email == $admin_email)
        <div class="row">
            <div class="large-12 columns">
                <h1>Wedstrijddatum Wijzigen</h1>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <form action="{{ route('datum.update', $contests->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                    <table class="datum_table">
                        <tr class="datum_table">
                            <th class="small_column">ID</th>
                            <th>Begindatum</th>
                            <th>Beginuur</th>
                            <th>Einddatum</th>
                            <th>Einduur</th>
                        </tr>
                        <tr class="datum_table">
                            <td><input type="text" name="id" value="{{ $contests->id }}" readonly></td>
                            <td><input type="date" name="startDate" required pattern="date" value="{{ $contests->startDate }}"></td>
                            <td><input type="time" name="startHour" required pattern="time" value="{{ $contests->startHour }}"></td>
                            <td><input type="date" name="endDate" required pattern="date" value="{{ $contests->endDate }}"></td>
                            <td><input type="time" name="endHour" required pattern="time" value="{{ $contests->endHour }}"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <button type="submit" class="btn_spotify ">
                        wijzigen
                    </button>
                </form>
            </div>
        </div>
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


