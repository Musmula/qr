@extends('layouts.app')

@section('content')

@include('partials.bulma-header')

@include('partials.secondary-nav')

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column">
                <form action="{{ url('/generate/dynamic') }}" method="POST">
                    {{ csrf_field() }}
                    <label for="input" class="label">Link:</label>
                    <div class="field has-addons">
                        <p class="control is-expanded">
                            <input type="text" name="link" id="input" @keydown.enter.prevent class="input" placeholder="http://" v-model="QrContent">
                        </p>
                        <div class="control">
                            <span class="select">
                                <select v-model="webCodeType">
                                    <option value="Static" title="test">Static</option>
                                    <option value="Dynamic" 
                                            {!! Auth::guest() ? 'disabled' : null !!}
                                            {!! Auth::guest() ? 'title="You have to have an account to use this feature"' : null !!}
                                            >Dynamic</option>
                                </select>
                            </span>
                        </div>
                    </div>

                    @if (Auth::guest())
                        <p class="help is-info">
                            Due to technical limitations, you have to register a free account in order to use the dynamic QR code feature. 
                            However, the static codes still work fine without one.
                        </p>
                    @endif

                    <div v-show="webCodeType == 'Dynamic'">
                        <div class="field">
                            <label for="name">Name</label>
                            <p class="control">
                                <input type="text" name="name" class="input" id="name">
                            </p>
                        </div>

                        <div class="field">
                            <label for="description">Description (optional)</label>
                            <p class="control">
                                <textarea name="description" id="description" class="textarea"></textarea>
                            </p>
                        </div>

                        <div class="field">
                            <p class="control">
                                <button class="button is-primary">Generate dynamic link</button>
                            </p>
                        </div>
                    </div>
                </form>

            </div>
            <div class="column">
                <div class="field" v-show="webCodeType == 'Static'">
                    <label class="label">Live preview</label>
                    <qr :content="QrContent" type="website"></qr>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.user-links')

@endsection
