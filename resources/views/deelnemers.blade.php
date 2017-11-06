@extends('layouts.master')

@section('content')
@if (Auth::user())
    @if (Auth::user()->email == $admin_email)
        <div class="row">
            <div class="large-8 columns">
                @if(isset($participants))
                    @if(Session::has('userDisqualified'))
                        <div data-alert class="alert-box success round">
                            {{ Session::get('userDisqualified') }}
                            <a href="#" class="close">&times;</a>
                        </div>
                    @endif
                    <h1>Alle deelnemers</h1>

                    <table class="datum_table">
                        <tr class="datum_table">
                            <th>Rank</th>
                            <th>Naam</th>
                            <th>Punten</th>
                            <th>Disqualificeren</th>
                        </tr>
                        @foreach($participants as $index => $participant) 
                            <tr class="datum_table">
                                <td>{{ $index+1 }}</td>
                                <td>{{ $users[$participant['user_id']-1]->name }}</td>
                                <td>{{ $participant['points'] }}</td>
                                <td>
                                
                                    <form action="{{ route('deelnemers.destroy', $users[$index]->id ) }}" method="POST">
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
                @endif
            </div>
        </div>
    @endif
@endif

@stop