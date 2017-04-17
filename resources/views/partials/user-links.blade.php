@if (isset($links) && count($links) > 0)
    <section class="section">
        <div class="container">
            <h2 class="title is-4">Your Dynamic web QR Codes</h2>
            <div class="masonry-grid">
            <div class="content">
                <ul>
                    @foreach ($links as $link)
                        <li><a @click="fireModal('{{ $link->id }}')">{{ $link->name }}</a></li>
                        <modal-qr 
                            ref="{{ $link->id }}" 
                            static-link="{{ $link->static_link }}"
                            set-name="{{ $link->name }}"
                            set-description="{{ $link->description }}"
                            set-link="{{ $link->dynamic_link }}"
                            >
                        </modal-qr>
                    @endforeach
                </ul>
            </div>
            </div>
        </div>
    </section>
@endif