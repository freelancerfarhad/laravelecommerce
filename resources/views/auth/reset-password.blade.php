@extends('layouts.app')
@section('admin-login')

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
      <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
      <div class="tx-center mg-b-30">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</div>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                 <input type="email"id="email"  name="email" class="form-control"value="{{old('email')}}" placeholder="Enter your email"required autofocus>
            </div>
           
            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password"id="password" name="password" class="form-control" placeholder="Enter your password"required autocomplete="new-password">
        </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirmation Password</label>
                <input type="password" id="password_confirmation"name="password_confirmation" class="form-control" placeholder="Confirmation Password"required>
            </div>
            <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
            <button type="submit" class="btn btn-info btn-block">Reset Password</button>
        
        
        </form>
    </div>
</div>
@endsection