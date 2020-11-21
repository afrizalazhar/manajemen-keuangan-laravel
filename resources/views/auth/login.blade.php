@extends('layouts.app')

@section('content')
    <div class="hold-transition login-page gradient-primary">
        <div class="login-box">
            <div class="card" style="border-radius: 3%">
                <div class="card-body login-card-body" style="border-radius: 3%">
                    <div class="login-logo">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="rounded-circle" style="background-color: #16a085;width: 85px;height:85px">
                                <span style="font-size: 58px"><i class="fa fa-dollar-sign" style="color: #fff"></i></span>
                            </div>
                        </div>
                        <a href="#"><b>SISTEM KEUANGAN</b></a>
                    </div>
                    <p class="login-box-msg">Sistem Informasi Keuangan Laravel</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email" class="col-form-label text-md-right">Email</label>
                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="admin@admin.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-script')
<script>

</script>
@endsection
