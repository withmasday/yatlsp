@extends('layouts.app')

@section('content')
    <div id="particles-js"></div>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card border-0 rounded-3 shadow-lg px-5">
                    <h4 class="text-primary text-center mt-5">{{ config('app.name', 'Laravel') }} | Sign In</h4>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mt-3">
                                <label for="username" class="text-secondary">{{ __('Username') }}</label>
                                <div>
                                    <input id="username" type="text"
                                        class="ps-0 text-secondary border-0 rounded-0 shadow-none border-1 border-bottom form-control @error('username') is-invalid @enderror"
                                        name="username" value="{{ old('username') }}" required autocomplete="username"
                                        autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-3">
                                <label for="password" class="text-secondary">{{ __('Password') }}</label>
                                <div>
                                    <input id="password" type="password"
                                        class="ps-0 text-secondary border-0 rounded-0 shadow-none border-1 border-bottom form-control @error('password') is-invalid @enderror"
                                        name="password" value="{{ old('password') }}" required autocomplete="password"
                                        autofocus>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary w-100 py-2 mt-4">
                                        {{ __('Sign In') }}
                                    </button>

                                    <a href="{{ route('register') }}" class="btn btn-primaryc w-100 py-2 mt-3 mb-5">
                                        {{ __('Not Have Account? Sign Up Here') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
