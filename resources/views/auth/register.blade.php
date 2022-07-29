@extends('layouts.app')
@section('admin-login')

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
        <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
          <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
          <div class="tx-center mg-b-40">The Admin Template For Perfectionist</div>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="{{ route('register') }}" method="post">
             @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"id="name"name="name" class="form-control"value="{{old('name')}}" placeholder="Enter your username"required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"id="email"name="email" class="form-control"value="{{old('email')}}" placeholder="Enter your username"required >
                </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"id="password" name="password" class="form-control" placeholder="Enter your password"required autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Re-Type Password</label>
                    <input type="password" id="password_confirmation"name="password_confirmation" class="form-control" placeholder="Re-Type Password"required>
                </div>
     
                <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
                <button type="submit" class="btn btn-info btn-block">Sign Up</button>
            </form>
          <div class="mg-t-30 tx-center">Not yet already taken ? <a href="{{ route('login') }}" class="tx-info">Sign in</a></div>


        </div><!-- login-wrapper -->
      </div><!-- d-flex -->
  
@endsection