@if (count($links) > 0)
    <section class="section">
        <div class="container">
            <h2 class="title is-4">Your Dynamic web QR Codes</h2>
            <div class="masonry-grid">
            <div class="content">
                <ul>
                    @foreach ($links as $link)
                        <li><a @click="fireModal('{{ $link->id }}')">{{ $link->name }}</a></li>
                        <modal-qr ref='{{ $link->id }}' url="{{ $link->static_link }}">
                            <span slot="name">{{ $link->name }}</span>
                            <p>
                                {{ $link->description }}
                            </p>
                        </modal-qr>
                    @endforeach
                </ul>
            </div>
            </div>
        </div>
    </section>
@endif