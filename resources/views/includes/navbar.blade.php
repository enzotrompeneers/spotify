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
                        @if (Auth::user()->email == $admin_email)
                            <div class="dropdown">
                                <li class="dropbtn">Admin 
                                <i class="fa fa-caret-down"></i>
                                </li>
                                <div class="dropdown-content">
                                <a href="{{ route('wedstrijdverantwoordelijke.index') }}">Wedstrijdverantwoordelijke</a>
                                <a href="{{ route('datum.index') }}">Wedstrijddatums</a>
                                <a href="{{ route('deelnemers.index') }}">Deelnemers</a>
                                </div>
                            </div> 
                                
                            <li><a href="{{ route('logout') }}">Uitloggen</a></li>
                        @endif
                    @endif
                </ul>
            </section>
            </nav>
        </div>
    </div>
</div>
<!-- End Menu -->