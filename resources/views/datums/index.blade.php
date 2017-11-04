
@extends('layouts.master')

@section('content')
@if (Auth::user())
    @if (Auth::user()->email == $admin_email)
        <div class="row">
            <div class="large-12 columns">
                <h1>Wedstrijddatums</h1>
                 @if(Session::has('contestCreated'))
                    <div data-alert class="alert-box success round">
                        {{ Session::get('contestCreated') }}
                        <a href="#" class="close">&times;</a>
                    </div>
                @endif
                @if(Session::has('contestUpdated'))
                    <div data-alert class="alert-box success round">
                        {{ Session::get('contestUpdated') }}
                        <a href="#" class="close">&times;</a>
                    </div>
                @endif
                <table class="datum_table">
                    <tr class="datum_table">
                        <th>id</th>
                        <th>Begindatum</th>
                        <th>Einddatum</th>
                        <th class="small_column">Wijzigen</th>
                        <th class="small_column">Verwijderen</th>
                    </tr>
                    @foreach($contests as $contest) 
                        <tr class="datum_table">
                            <td>{{ $contest->id }}</td>
                            <td>{{ Carbon\Carbon::parse($contest->startDate)->format('d/m/Y - h:m') }}</td>
                            <td>{{ Carbon\Carbon::parse($contest->endDate)->format('d/m/Y - h:m') }}</td>
                            <td><a href="{{ route('datum.edit', $contest->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                            <td><a href="{{ route('datum.destroy', $contest->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    @include('datums.create');

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
