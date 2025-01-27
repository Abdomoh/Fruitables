@extends('layouts.website.master-login')
@section('content')
    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="text-center mx-auto" style="max-width: 700px;">
                            <p class="text-primary" style="font-weight: 500;font-size:20px;">  {{ __('main.login') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <form action="{{ route('login') }}" class="" method="POST" class="" dir="">
                            @csrf
                            <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4"
                                placeholder=" {{ __('main.Enter_Your_Email') }}">

                            <input type="password" name="password" class="w-100 form-control border-0 py-3 mb-4"
                                placeholder=" {{ __('main.Enter_Your_Password') }}">
                            <x-input-error :messages="$errors->get('password')" class="mt-2  text-danger" />
                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                                type="submit" name="submit">{{ __('main.login') }} </button>
                            <br>
                            <div class="text-center">
                                <p class="text-blue">  {{ __('main.Or') }}  {{ __('main.login') }} :</p>
                            </div>
                        </form>
                        <a href="{{ route('redirect.google') }}">  <button class="w-100 btn form-control border-secondary "data-mdb-button-init
                            data-mdb-ripple-init class="btn btn-lg btn-block btn-primary mb-2" style=""
                          ><i class="fab fa-google me-2"></i>
                          {{ __('main.google_account') }} </button></a><br><br>
                            <a href="{{ route('redirect.facebook') }}"> <button class="w-100 btn form-control border-secondary "data-mdb-button-init
                                data-mdb-ripple-init class="btn btn-lg btn-block btn-primary mb-2" style=""
                               ><i class="fab fa-facebook-f me-2"></i>
                                  {{ __('main.facebook_account') }} </button></a>
                    </div>
                   <a href="{{ route('register') }}"><p class="text-red text-center">  {{ __('main.register') }}</p></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@stop
