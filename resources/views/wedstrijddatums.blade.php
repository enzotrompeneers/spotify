@extends('layouts.master')

@section('content')

<div class="row">
    <div class="large-12.columns">
        <form action="{{ route('datum.create') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="large-12.columns">
                    <h2>Wedstrijddatums Tonen</h2>
                    <table>
                        <tr>
                            <td>id</td>
                            <td>Start Datum</td>
                            <td>Einde Datum</td>
                        </tr>
                        @foreach($contests as $contest) 
                            <tr>
                                <td>{{ $contest->id }}</td>
                                <td>{{ $contest->startDate }}</td>
                                <td>{{ $contest->endDate }}</td>
                            </tr>
                        @endforeach
                    </table>

                    <h2>Wedstrijddatum Maken</h2>
                    {!! Form::text('date', '', array('id' => 'datepicker')) !!}
                
                </div>

                <div class="medium-6 cell">
                    <div class="form-group">
                        <label for="from">Van</label>
                        <input type="datetime" class="datetimepicker datepicker" id="from" name="from" placeholder="Begin datum">
                    </div>
                </div>

                <div class="medium-6 cell">
                    <div class="form-group">
                        <label for="to">Tot</label>
                        <input type="datetime" class="datetimepicker datepicker" id="to" name="to" placeholder="Eind datum">
                    </div>
                </div>

                <div class="medium-4 cell">
                    <div class="form-group">
                        <label for="start_hour">Start uur</label>
                        <input type="datetime" class="datetimepicker timepicker" id="start_hour" name="start_hour" placeholder="Start uur" value="12:00">
                    </div>
                </div>
                <div class="medium-4 cell">
                    <div class="form-group">
                        <label for="end_hour">Eind uur</label>
                        <input type="datetime" class="datetimepicker timepicker" id="end_hour" name="end_hour" placeholder="Eind uur" value="12:00">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
