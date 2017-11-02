<!-- Menu -->
<div class="marketing-site-footer">
    <div class="row medium-unstack">
        <div class="large-12 columns">
        <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name"><a href="{{ route('home') }}"><img src="{{asset('assets/graphics/spotify_logo.png')}}" alt="spotify logo" class="logo"></a></li>
        </ul>
        <section class="top-menu">
            <ul class="left">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('deelnemen.index') }}">Deelnemen</a></li>
            </ul>
            <ul class="right">
                @if ($user = Auth::guest()) 
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Registreren</a></li>
                @else
                    <li><a href="{{ route('logout') }}">Uitloggen</a></li>
                @endif
            </ul>
        </section>
        </nav>
    </div>
    </div>
</div>
<!-- End Menu -->