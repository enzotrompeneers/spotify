@component('mail::message')
# Spotify

Wedstrijd is afgelopen. <br>
De winnaar is: {{ $winner_email }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Bedankt,<br>
Spotify
@endcomponent
