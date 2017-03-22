@extends('layouts.app')

@section('content')

    <section class="hero is-warning">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    Welcome to {{ config('app.name') }}
                </h1>
                <h2 class="subtitle">
                    Please fill out the registration form to create a new account
                </h2>
            </div>
        </div>
    </section>

    <div class="container section">
        <div class="column is-4 is-offset-4">
            <form action="{{ route('register') }}" method="POST">  
                {{ csrf_field() }}
                <div class="field">
                    <label for="name">Name</label>
                    <div class="control">
                        <input 
                            type="text" 
                            class="input {{ $errors->has('name') ? ' is-danger' : '' }}" 
                            id="name" 
                            name="name"
                            required 
                            autofocus 
                            value="{{ old('name') }}">
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                    </div>
                </div>
                
                <div class="field">
                    <label for="email">E-mail</label>
                    <div class="control">
                        <input 
                            type="email" 
                            class="input {{ $errors->has('email') ? ' is-danger' : '' }}" 
                            id="email" 
                            name="email"
                            required 
                            value="{{ old('email') }}">
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
                            name="password"
                            required>
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                    </div>
                </div>
                
                <div class="field">
                    <label for="password_confirmation">Password confirmation</label>
                    <div class="control">
                        <input 
                            type="password" 
                            class="input" 
                            id="password_confirmation" 
                            name="password_confirmation"
                            required>
                    </div>
                </div>
        
                <div class="field">
                    <div class="control center-vertically">
                        <button class="button is-warning">Register</button>
                        <a href="{{ url('login') }}">Already have an account?</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

@stop