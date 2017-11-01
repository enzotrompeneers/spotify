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