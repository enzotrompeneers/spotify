@component('mail::message')
# Spotify

De wedstrijd is afgelopen. <br>
De winnaar van de wedstrijd is: **{{ $winner_email }}**.

@component('mail::button', ['url' => 'http://spotify.dev'])
Ga naar het dashboard.
@endcomponent

Bedankt,<br>
{{ config('app.name') }}
@endcomponent
