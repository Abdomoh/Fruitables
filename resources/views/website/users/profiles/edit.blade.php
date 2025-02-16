@extends('layouts.website.nav')
@section('content')
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <br><br>
                        <h6 style="font-family: Cairo;">{{ __('main.profile_information') }}</h6>
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white"
                                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                        alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                    <h5 style="font-family: Cairo;">{{ $user->name ?? '' }} {{ $user->last_name ?? '' }}
                                    </h5>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h6 style="font-family: Cairo;">{{ __('main.profile_information') }}</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6 style="font-family: Cairo;">{{ __('main.Email') }}</h6>
                                                <p style="font-family: Cairo;" class="text-muted">{{ $user->email ?? '' }}
                                                </p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6 style="font-family: Cairo;">{{ __('main.phone') }}</h6>
                                                <p style="font-family: Cairo;" class="text-muted">{{ $user->phone ?? '' }}
                                                </p>
                                            </div>
                                        </div>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6 style="font-family: Cairo;">{{ __('main.Last_Name') }}</h6>
                                                <p style="font-family: Cairo;" class="text-muted">{{ $user->last_name }}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6 style="font-family: Cairo;">{{ __('main.address') }}</h6>
                                                <p style="font-family: Cairo;" class="text-muted">{{ $user->address }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-start">
                                            <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                            <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                            <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 style="font-family: Cairo;">{{ __('main.Update_Profile') }}</h6>
                        <form action="{{ route('profile-user.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ __('main.Last_Name') }}</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('main.Last_Name') }}</label>
                                <input type="text" name="last_name" class="form-control"
                                    value="{{ old('last_name', $user->last_name) }}">
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('main.Email') }}</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('main.address') }}</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ old('address', $user->address) }}">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('main.password') }} ({{ __('main.optional') }})</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('main.Confirm_Password') }}</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('main.Update_Profile') }}</button>
                        </form>
                    </div>
                    {{-- end col-md-6-- --}}
                </div>
            </div>
        </div>
    </div>
@endsection
