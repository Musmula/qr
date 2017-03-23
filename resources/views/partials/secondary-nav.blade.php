<nav class="home-nav nav has-shadow">
    <div class="container has-text-centered">
        <div class="nav-left">
            <div class="tabs is-centered">
                <a class="nav-item is-tab {{ $active == 'web' ? 'is-active' : '' }}" href="{{ url('/generate/web') }}">
                    <span class="icon is-small"><i class="fa fa-globe"></i></span>
                    <span>Web</span>
                </a>
                <a class="nav-item is-tab {{ $active == 'text' ? 'is-active' : '' }}" href="{{ url('/generate/text') }}">
                    <span class="icon is-small"><i class="fa fa-file-text"></i></span>
                    <span>Text</span>
                </a>
                <a class="nav-item is-tab {{ $active == 'vcard' ? 'is-active' : '' }}">
                    <span class="icon is-small"><i class="fa fa-vcard"></i></span>
                    <span>vCard</span>
                </a>
                <a class="nav-item is-tab {{ $active == 'location' ? 'is-active' : '' }}">
                    <span class="icon is-small"><i class="fa fa-map-marker"></i></span>
                    <span>Location</span>
                </a>
                <a class="nav-item is-tab {{ $active == 'event' ? 'is-active' : '' }}">
                    <span class="icon is-small"><i class="fa fa-calendar"></i></span>
                    <span>Event</span>
                </a>
                <a class="nav-item is-tab {{ $active == 'email' ? 'is-active' : '' }}">
                    <span class="icon is-small"><i class="fa fa-envelope"></i></span>
                    <span>E-mail</span>
                </a>
                <a class="nav-item is-tab {{ $active == 'wifi' ? 'is-active' : '' }}">
                    <span class="icon is-small"><i class="fa fa-wifi"></i></span>
                    <span>Wi-Fi</span>
                </a>
            </div>
        </div>
    </div>
</nav>