@extends('layouts.website.master-login')
@section('content')
    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <x-guest-layout>
                <div class="mb-4 text-sm text-gray-600" style="font-family: Cairo;">
                    {{ __('main.Forgot your password?') }}
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('main.Email')" style="font-family: Cairo;" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-md btn-block btn-primary mb-2" style="font-family: Cairo;">
                            {{ __('main.Email_Password_Reset_Link') }}
                        </button>
                    </div>
                </form>
            </x-guest-layout>
        </div>
    </div>
@endsection
