@extends('layouts.app')

@section('content')

<section class="section hero is-warning">
    <div class="hero-body">
        <div class="container">
            <h1 class="title color-dark">Generate a new QR code</h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="column is-4 is-offset-4">
            <qr></qr>
        </div>
    </div>
</section>

@endsection
