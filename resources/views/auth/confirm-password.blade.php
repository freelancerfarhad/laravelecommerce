@extends('layouts.app')
@section('admin-login')


        <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
              <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
              <div class="tx-center mg-b-30">This is a secure area of the application. Please confirm your password before continuing.</div>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password"id="password" name="password" class="form-control" placeholder="Enter your password"required autocomplete="new-password">
        </div>

            <button type="submit" class="btn btn-info btn-block">Confirm</button>

        </form>
@endsection
