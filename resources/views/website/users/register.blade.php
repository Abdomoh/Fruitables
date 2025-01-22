@extends('layouts.website.master-login')
@section('content')
        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <p class="text-primary" style="font-weight: 500;font-size:20px;"> انشاء حساب جديد </p>
                               
                            </div>
                        </div>
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <div class="col-lg-12">
                            <form action="{{ route('register') }}" class="" method="POST" dir="rtl">
                                <input type="text" name="name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name">
                                <x-input-error :messages="$errors->get('name')" class="mt-2  text-danger" />
                                <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2  text-danger" />
                                <input type="password" name="'password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2  text-danger" />
                                <input type="password"  name="password_confirmation" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Password Confirmation">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">register</button>
                            </form>
                        </div>
                        
                
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        @endsection