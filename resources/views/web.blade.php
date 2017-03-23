@extends('layouts.app')

@section('content')

@include('partials.bulma-header')

@include('partials.secondary-nav')

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="input" class="label">Link:</label>
                    <p class="control">
                        <input type="text" id="input" class="input" placeholder="http://" v-model="QrContent">
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <button class="button is-primary">Make dynamic</button>
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Live preview</label>
                    <qr :content="QrContent" type="website"></qr>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.links-wip')

@endsection
