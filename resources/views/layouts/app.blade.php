<!DOCTYPE html>
<html lang="en">
  <head>

    <title>login</title>

    <!-- vendor css -->
    <link href="{{asset('public/backend/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/lib/ionicons/css/ionicons.min.css" rel="stylesheet')}}">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('public/backend/css/bracket.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/custom.css')}}">
  </head>

  <body>

  @yield('admin-login')

    <script src="{{asset('public/backen/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/backend/lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{asset('public/backend/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  </body>
</html>
