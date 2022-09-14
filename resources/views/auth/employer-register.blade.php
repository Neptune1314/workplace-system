@extends('layouts.master')

@section('content')

<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            @if (Session::has('MessageCompany'))
                <div class="alert alert-success">
                    {{ Session::get('MessageCompany') }}
                </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Цахим ажлын байрны системд ажил олгогчоор бүртгүүлэх') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('employer.register') }}">
                            @csrf
    
                            <input type="hidden" name="user_type" value="employer">
    
                            <div class="row mb-3">
                                <label for="cname" class="col-md-4 col-form-label text-md-end">{{ __('Ажил олгогч компани нэр') }}</label>
    
                                <div class="col-md-6">
                                    <input id="cname" type="text" class="form-control @error('name') is-invalid @enderror" name="cname" value="{{ old('cname') }}" required autocomplete="cname" autofocus>
    
                                    @error('cname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Цахим шуудан') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Нууц үг') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Нууц үг давтах') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Бүртгүүлэх') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
