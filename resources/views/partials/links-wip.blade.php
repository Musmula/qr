@if (count($links) > 0)
    <section class="section">
        <div class="container">
            <h2 class="title is-4">Your Dynamic web QR Codes</h2>
            <div class="masonry-grid">
            <div class="content">
                <ul>
                    @foreach ($links as $link)
                        <li><a @click="viewCode('{{ $link->static_link }}')">{{ $link->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            </div>
        </div>
    </section>
@endif