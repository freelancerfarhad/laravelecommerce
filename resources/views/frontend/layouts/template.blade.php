<!DOCTYPE html>
<html>
	<head>
   
        @include('frontend.includes.header')
        @include('frontend.includes.css')
       
@yield('style')
	</head>
	<body>

		<div class="body">
            @include('frontend.includes.menu')

            @yield('body-content')
			@include('frontend.includes.footer')
		</div>

        @include('frontend.includes.script')
        @yield('script')
	</body>
</html>
