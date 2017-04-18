@extends('layouts.app')

@section('content')

    @include('partials.bulma-header')

    @include('partials.secondary-nav', ['active' => 'none'])

    <section class="section">
        <div class="container">
            <div class="columns">
                <form action="{{ url('profile') }}" method="POST" class="column">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <h2 class="title">Update basic info</h2>
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input 
                                type="text" 
                                class="input {{ $errors->has('name') ? ' is-danger' : '' }}" 
                                id="name" 
                                name="name"
                                required 
                                autofocus 
                                value="{{ Auth::user()->name }}">
                            <p class="help is-danger">{{ $errors->first('name') }}</p>
                        </p>
                    </div>

                    <div class="field">
                        <label for="email" class="label">E-mail</label>
                        <p class="control">
                            <input 
                                type="email" 
                                class="input {{ $errors->has('email') ? ' is-danger' : '' }}" 
                                id="email" 
                                name="email"
                                required 
                                value="{{ Auth::user()->email }}">
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        </p>
                    </div>  

                    <div class="field">
                        <button class="button">Update basic info</button>
                    </div>
                </form>

                <form action="{{ url('profile/password') }}" method="POST" class="form column">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <h2 class="title">Update password</h2>
                    <div class="field">
                        <label for="password" class="label">Current password</label>
                        <p class="control">
                            <input 
                                type="password" 
                                class="input {{ $errors->has('password') ? ' is-danger' : '' }}" 
                                id="password" 
                                name="password"
                                required >
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                        </p>
                    </div>
                    <div class="field">
                        <label for="new_password" class="label">New password</label>
                        <p class="control">
                            <input 
                                type="password" 
                                class="input {{ $errors->has('new_password') ? ' is-danger' : '' }}" 
                                id="new_password" 
                                name="new_password"
                                required>
                            <p class="help is-danger">{{ $errors->first('new_password') }}</p>
                        </p>
                    </div>
                    <div class="field">
                        <label for="new_password_confirmation" class="label">New password confirmation</label>
                        <p class="control">
                            <input 
                                type="password" 
                                class="input {{ $errors->has('new_password_confirmation') ? ' is-danger' : '' }}" 
                                id="new_password_confirmation" 
                                name="new_password_confirmation"
                                required>
                            <p class="help is-danger">{{ $errors->first('new_password_confirmation') }}</p>
                        </p>
                    </div>
                    <div class="field">
                        <button class="button">Update passsword</button>
                    </div>
                </form>
                
            </div>
        </div>
    </section>

@stop