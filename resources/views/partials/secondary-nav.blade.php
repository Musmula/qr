<nav class="home-nav nav has-shadow">
    <div class="container has-text-centered">
        <div class="nav-left">
            <div class="tabs is-centered">
                <a class="nav-item is-tab {{ $active == 'web' ? 'is-active' : '' }}" href="{{ url('/generate/web') }}">
                    <span class="icon is-small"><i class="icon-globe"></i></span>
                    <span>Web</span>
                </a>
                <a class="nav-item is-tab {{ $active == 'text' ? 'is-active' : '' }}" href="{{ url('/generate/text') }}">
                    <span class="icon is-small"><i class="icon-doc-text-inv"></i></span>
                    <span>Text</span>
                </a>
{{--                 <a class="nav-item is-tab {{ $active == 'vcard' ? 'is-active' : '' }}" href="{{ url('/generate/vcard') }}">
                    <span class="icon is-small"><i class="icon-vcard"></i></span>
                    <span>vCard</span>
                </a> --}}
                <a class="nav-item is-tab {{ $active == 'location' ? 'is-active' : '' }}" href="{{ url('/generate/location') }}">
                    <span class="icon is-small"><i class="icon-location"></i></span>
                    <span>Location</span>
                </a>
{{--                 <a class="nav-item is-tab {{ $active == 'event' ? 'is-active' : '' }}">
                    <span class="icon is-small"><i class="icon-calendar"></i></span>
                    <span>Event</span>
                </a> --}}
                <a class="nav-item is-tab {{ $active == 'email' ? 'is-active' : '' }}" href="{{ url('/generate/email') }}">
                    <span class="icon is-small"><i class="icon-mail-alt"></i></span>
                    <span>E-mail</span>
                </a>
                <a class="nav-item is-tab {{ $active == 'wifi' ? 'is-active' : '' }}" href="{{ url('/generate/wifi') }}">
                    <span class="icon is-small"><i class="icon-wifi"></i></span>
                    <span>Wi-Fi</span>
                </a>
            </div>
        </div>
    </div>
</nav>