<!DOCTYPE html>
<html lang="en">
  <head>
  @include('backend.includes.header')
  @include('backend.includes.css')
  @yield('style')
  </head>

  <body>
    @include('backend.includes.leftbar')
    @include('backend.includes.topbar')
    @include('backend.includes.rightbar')
    <div class="br-mainpanel">
        @yield('body-content')
      @include('backend.includes.footer')
    </div>
    @include('backend.includes.script')
    @yield('scripts')
  </body>
</html>
