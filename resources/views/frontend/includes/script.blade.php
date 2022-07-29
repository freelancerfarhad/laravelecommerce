		<!-- Vendor -->
		<script src="{{asset('public/frontend/vendor/jquery/jquery.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/jquery.cookie/jquery.cookie.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/popper/umd/popper.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/common/common.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/jquery.validation/jquery.validate.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/isotope/jquery.isotope.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/vide/jquery.vide.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/vivus/vivus.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/bootstrap-star-rating/js/star-rating.min.js')}}"></script>
		<script src="{{asset('public/frontend/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js')}}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('public/frontend/js/theme.js')}}"></script>

		<!-- Current Page Vendor and Views -->
		<script src="{{asset('public/frontend/js/views/view.shop.js')}}"></script>

		<!-- Theme Custom -->
		<script src="{{asset('public/frontend/js/custom.js')}}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{asset('public/frontend/js/theme.init.js')}}"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
		{!! Toastr::message() !!}
		<script>//laravel ar default validator message k tostr a show kora holo
			@if($errors->any())
			@foreach($errors->all() as $error)
				toastr.error('{{$error}}','Error',{
					closeButton:true,
					progressBar:true,
				})
			@endforeach
			@endif
		</script>
<script type="text/javascript">
$('#divistion_id').change(function(){
	var division = $('#divistion_id').val();
	// alert(division);
	$('#district_names').html("");
	var option="";

	$.get( "get-district/"+division, function( data ) {
  	var data= JSON.parse(data);
	data.forEach(function(element){
		option += "<option value='"+element.id+"'>"+element.district_name+"</option>";
	});
	$('#district_names').html(option);

	});
});
</script>



		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->
<!----SSL_COMMERZ INTREGRATION SCRIOT----->
		 {{-- <script>
			(function (window, document) {
				var loader = function () {
					var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
					script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
					tag.parentNode.insertBefore(script, tag);
				};
		
				window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
			})(window, document);
		</script> --}}
