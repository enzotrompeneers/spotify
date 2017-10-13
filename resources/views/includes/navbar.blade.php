<!-- Menu -->
<div class="row">
    <div class="large-12 columns">
        <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name"><a href="{{ route('home') }}"><img src="{{asset('assets/graphics/spotify_logo.png')}}" alt="spotify logo" class="logo"></a></li>
        </ul>
        <section class="top-bar-section">
            <ul class="left">
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('deelnemen') }}">Deelnemen</a></li>
            </ul>
            <ul class="right">
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
        </section>
        </nav>
    </div>
</div>
<!-- End Menu -->