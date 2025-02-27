@extends('layouts.website.master-login')
@section('content')
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <x-guest-layout>
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('main.Email')" style="font-family: Cairo;" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('main.Password')" style="font-family: Cairo;" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('main.password_Confirmation')" style="font-family: Cairo;" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="font-family: Cairo;" />
                    </div>


                    <div class=" mt-4">
                        <button class="btn btn-md btn-block btn-primary mb-2" style="font-family: Cairo;">
                            {{ __('main.Reset Password') }}
                        </button>
                    </div>
                </form>
            </x-guest-layout>
        </div>
    </div>
@endsection
