@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status') === false)
                        <div class="alert alert-warning" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif

                    @if (session('status') === true)
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                            @if(env('PRODUCTION')=='NO')
                                <br />
                                <span>Please redirect to </span>
                                <br />
                                <a href="{{session('redirect_link')}}">{{session('redirect_link')}}</a>
                            @endif
                        </div>
                    @endif

                    <form method="POST" action="{{ url('password/request_email') }}" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
