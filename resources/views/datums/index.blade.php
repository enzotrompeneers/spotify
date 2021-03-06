
@extends('layouts.master')

@section('content')
@if (Auth::user())
    @if (Auth::user()->email == $admin_email)
        @if (!$contests->isEmpty())

            @if(Session::has('contestError'))
                <div class="row">
                    <div class="large-8 columns">
                        <div data-alert class="alert-box alert round">
                            {{ Session::get('contestError') }}
                            <a href="#" class="close">&times;</a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="large-12 columns">
                    <h1>Wedstrijddatums</h1>
                </div>

                <div class="large-4 columns">
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
                    @if(Session::has('contestDestroyed'))
                        <div data-alert class="alert-box success round">
                            {{ Session::get('contestDestroyed') }}
                            <a href="#" class="close">&times;</a>
                        </div>
                    @endif
                </div>
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
                                <td>{{ Carbon\Carbon::parse($contest->startDate)->format('d/m/Y - G:i:s') }}</td>
                                <td>{{ Carbon\Carbon::parse($contest->endDate)->format('d/m/Y - G:i:s') }}</td>
                                <td>
                                    <a href="{{ route('datum.edit', $contest->id) }}">
                                        <button type="submit" class="button tiny round action_btn">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('datum.destroy', $contest->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="alert button tiny round action_btn">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        @else
            <div class="row">
                <div class="large-12 columns">
                    <h1>Er zijn nog geen wedstrijddatums aangemaakt.</h1>
                </div>
            </div>
        @endif

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
