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
                    <div class="row">
                        <div class="large-12 columns">
                            @if($participants)
                                <h1>Lijst deelnemers</h1>
                                <table class="datum_table">
                                    <tr class="datum_table">
                                        <th>Rank</th>
                                        <th>Naam</th>
                                        <th>Email</th>
                                        <th>IP Adres</th>
                                        <th>Straat en Huisnr.</th>
                                        <th>Stad</th>
                                        <th>Contest ID</th>
                                        <th>Punten</th>
                                        <th>Disqualificeren</th>
                                    </tr>
                                    
                                    <?php $n = 0; ?>
                                    @foreach($participants as $participant) 
                                        <tr>
                                            <?php $n++; ?>
                                            <td>{{ $n }}</td>
                                            <td>{{ $participant->user->name }}</td>
                                            <td>{{ $participant->user->email }}</td>
                                            <td>{{ $participant->user->ipaddress }}</td>
                                            <td>{{ $participant->user->address }}</td>
                                            <td>{{ $participant->user->city }}</td>
                                            <td>{{ $participant->contest_id }}</td>
                                            <td>{{ $participant->points }}</td>
                                            <td>
                                                <form action="{{ route('deelnemers.destroy', $participant->user->id ) }}" method="POST">
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
            </div>
        </div>
    @endif
@endif

@stop