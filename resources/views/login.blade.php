@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="text" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" id="password" name="password" placeholder="Password" type="password" required autocomplete="current-password"/>
                                @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="loginBtn" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <a class="btn btn-danger" href="{{ url('/') }}">Cancel</a>
                                <a class="btn btn-warning" style="margin-left: 82px;" onclick="setDefaultLogin()">
                                    {{ __('Admin Login') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function setDefaultLogin(){
        $("#email").val("korodarmo@gmail.com");
        $("#password").val("wahyu123");
        $("#loginBtn").click();
    }
</script>
@endsection
