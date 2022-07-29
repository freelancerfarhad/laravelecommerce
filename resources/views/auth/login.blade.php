@extends('layouts.app')
@section('admin-login')


        <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
              <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
              <div class="tx-center mg-b-30">The Admin Dashboard For Perfectionist</div>

              <x-auth-session-status class="mb-4" :status="session('status')" />
              <x-auth-validation-errors class="mb-4" :errors="$errors" />
      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email"id="email"  name="email" class="form-control"value="{{old('email')}}" placeholder="Enter your email"required autofocus>
          </div>



          <div class="form-group">
            <label for="password">Password</label>
            <input type="password"id="password"name="password" class="form-control" placeholder="Enter your password"required autocomplete="current-password">
            <a href="{{route('password.request')}}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
          </div>



          <button type="submit" class="btn btn-info btn-block">Sign In</button>
  
          <div class="mg-t-30 tx-center">Not yet a member? <a href="{{route('register')}}" class="tx-info">Sign Up</a></div>

      </form>

            </div>
          </div>
        @endsection


