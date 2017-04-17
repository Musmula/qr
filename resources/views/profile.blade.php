@extends('layouts.app')

@section('content')

    @include('partials.bulma-header')

    @include('partials.secondary-nav', ['active' => 'none'])

    <section class="section">
        <div class="column is-4 is-offset-4">
            <div class="notification is-warning">
                <h2 class="title is-4">Attention!</h2>
                <p>None of these functions work at the moment</p>
                <p>They will... soon</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <form action="javascript:void(0)" class="column">
                    <h2 class="title">Update basic info</h2>
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input type="text" class="input" id="name" value="{{ Auth::user()->name }}" required>
                        </p>
                    </div>

                    <div class="field">
                        <label for="email" class="label">E-mail</label>
                        <p class="control">
                            <input type="text" class="input" id="email" value="{{ Auth::user()->email }}" required>
                        </p>
                    </div>  

                    <div class="field">
                        <button class="button">Update basic info</button>
                    </div>
                </form>

                <form action="javascript:void(0)" class="form column">
                    <h2 class="title">Update password</h2>
                    <div class="field">
                        <label for="password" class="label">Current password</label>
                        <p class="control">
                            <input type="password" class="input" name="password" id="password" required>
                        </p>
                    </div>
                    <div class="field">
                        <label for="new_password" class="label">New password</label>
                        <p class="control">
                            <input type="password" class="input" name="new_password" id="new_password" required>
                        </p>
                    </div>
                    <div class="field">
                        <label for="new_password_confirmation" class="label">New password confirmation</label>
                        <p class="control">
                            <input type="password" class="input" name="new_password_confirmation" id="new_password_confirmation" required>
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