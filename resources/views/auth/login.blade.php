@extends('layouts.app')

@section('content')

    <section class="section hero is-primary">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    User login
                </h1>
            </div>
        </div>
    </section>

    <div class="container section">
        <div class="column is-4 is-offset-4">
            <form action="{{ route('login') }}" method="POST">  
                {{ csrf_field() }}
                <div class="field">
                    <label for="email">E-mail</label>
                    <div class="control">
                        <input 
                        type="email" 
                        class="input {{ $errors->has('email') ? ' is-danger' : '' }}" 
                        id="email" 
                        name="email"
                        autofocus >
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                    </div>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <div class="control">
                        <input
                            type="password" 
                            class="input {{ $errors->has('password') ? ' is-danger' : '' }}"
                            id="password" 
                            name="password">
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                    </div>
                </div>

                <div class="field">
                    <div class="control center-vertically">
                        <button class="button is-primary">Log in</button>
                        <a href="{{ url('register') }}">Don't have an account?</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

@stop