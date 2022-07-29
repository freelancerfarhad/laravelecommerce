@extends('frontend.layouts.template')
@section('title','picabo')
@section('style')
	<style>
		.form-control:not(.form-control-sm):not(.form-control-lg) {
    /* padding: 17px 10px; */
}
	</style>
@endsection
@section('body-content')
	<div role="main" class="main shop py-4">
		<div class="container">

			<div class="row">
				<div class="col">
					<p>Returning customer? <a href="shop-login.html">Click here to login.</a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-9">

					<div class="accordion accordion-modern" id="accordion">
						<form action="{{route('make_payment')}}" id="frmShippingAddress" method="post">
							@csrf
						<div class="card card-default">
							<div class="card-header">
								<h4 class="card-title m-0">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
									Fillpu The	Shipping Address To Complate The Order
									</a>
								</h4>
							</div>
							<div id="collapseTwo" class="collapse show">
								<div class="card-body">
									{{-- <form action="" id="frmShippingAddress" method="post">
									@csrf --}}
										<div class="form-row">
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">First Name</label>
												<input type="text" value="@if(Auth::check()) {{Auth::user()->name}} @endif"name="first_name" class="form-control">
											</div>
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">Last Name</label>
												<input type="text" value=""name="last_name" class="form-control">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">Email</label>
												<input type="text" value="@if(Auth::check()) {{Auth::user()->email}} @endif" name="email"class="form-control">
											</div>
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">Phone</label>
												<input type="text" value=""name="phone" class="form-control">
											</div>
										</div>
										
										<div class="form-row">
											<div class="form-group col">
												<label class="font-weight-bold text-dark text-2">Shipping Address [ Flat No, House No, Road No etc..]</label>
												<input type="text" value=""name="address" class="form-control">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">Division</label>
												<select name="division_id" id="divistion_id"class="form-control">
													<option class="diviid" value="">Select Division Name</option>
													@foreach ($divisions as $division)
														<option value="{{$division->id}}">{{$division->name}}</option>
														@endforeach
												  </select>
											</div>
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">District</label>
												<select name="district_id" id="district_names"class="form-control">
													<option class="diviid" value="">Select District Name</option>
													{{-- @foreach ($districts as $district)
														<option value="{{$district->id}}">{{$district->district_name}}</option>
														@endforeach --}}
												  </select>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">Country </label>
												<input type="text" value="Bangladesh"name="country" class="form-control">
											</div>
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">Postal Code</label>
												<input type="text" value=""name="post_code" class="form-control">
											</div>
										</div>
									
										<div class="form-row">
											<div class="form-group col">
												<label class="font-weight-bold text-dark text-2">Message [ If Any ] </label>
												<textarea type="text" value=""name="message" class="form-control"placeholder="Write Your Message..."></textarea>
											</div>
										</div>
										{{-- <div class="form-row">
											<div class="form-group col">
												<input type="submit" value="Continue" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2" >
											</div>
										</div> --}}
									{{-- </form> --}}
								</div>
							</div>
						</div>
					
						<div class="card card-default">
							<div class="card-header">
								<h4 class="card-title m-0">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
										Review &amp; Payment
									</a>
								</h4>
							</div>
							<div id="collapseThree" class="collapse">
								<div class="card-body">
									<table class="shop_table cart">
										<thead>
											<tr>
												<th class="product-thumbnail">
													&nbsp;
												</th>
												<th class="product-name">
													Product
												</th>
												<th class="product-price">
													Price
												</th>
												<th class="product-quantity">
													Quantity
												</th>
												<th class="product-subtotal">
													Total
												</th>
											</tr>
										</thead>
										<tbody>
											@if($items->count() <=0)
											<div class="alert alert-info">
												Sorry ! No Items Added Into Your Cart. Please Add Your Product First...
											</div>
											@endif
											@php $total_price =0; @endphp
											@foreach ($items as $item)
												<tr class="cart_table_item">
													<td class="product-thumbnail">
														<a href="{{route('productdetails',$item->product->slug)}}">
															<img width="100" height="100" alt="" class="img-fluid" src="{{asset('public/backend/img/products/'.$item->product->images->first()->image)}}">
														</a>
													</td>
													<td class="product-name">
														<a href="{{route('productdetails',$item->product->slug)}}">{{$item->product->title}}</a>
													</td>
													<td class="product-price">
														<span class="amount">
															@if(! is_null($item->product->offer_price))
																{{$item->product->offer_price}}
																@else
																{{$item->product->regular_price}}
																@endif
														</span>
													</td>
													<td class="product-quantity">
														{{$item->quantity}}
													</td>
													<td class="product-subtotal">
														<span class="amount">
															@if(! is_null($item->product->offer_price))
																{{$total_price=$item->quantity * $item->product->offer_price}}
																@else
																{{$total_price=$item->quantity * $item->product->regular_price}}
																@endif
														</span>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
					
									<hr class="solid my-5">
					
									<h4 class="text-primary">Cart Totals</h4>
									<table class="cart-totals">
										<tbody>
											<tr class="cart-subtotal">
												<th>
													<strong class="text-dark">Cart Subtotal</strong>
												</th>
												<td>
													<strong class="text-dark"><span class="amount">{{App\Models\Cart::TotalPrice()}}</span></strong>
												</td>
											</tr>
											<tr class="shipping">
												<th>
													Shipping
												</th>
												<td>
													Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
												</td>
											</tr>
											<tr class="total">
												<th>
													<strong class="text-dark">Order Total</strong>
												</th>
												<td>
													<strong class="text-dark"><span class="amount">{{App\Models\Cart::TotalPrice()}}</span></strong>
												</td>
											</tr>
										</tbody>
									</table>
					
									<hr class="solid my-5">
					
									<h4 class="text-primary">Payment</h4>
					
									{{-- <form action="/" id="frmPayment" method="post"> --}}
										<div class="form-row">
											<div class="form-group col">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="paymentdirectbank">
													<label class="custom-control-label" for="paymentdirectbank">Direct Bank Transfer</label>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="paymentcheque">
													<label class="custom-control-label" for="paymentcheque">Cheque Payment</label>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="paymentpaypal">
													<label class="custom-control-label" for="paymentpaypal">Paypal</label>
												</div>
											</div>
										</div>
									{{-- </form> --}}
								</div>
							</div>
						</div>
					</div>
					
					<div class="actions-continue">
						<input type="hidden" name="amount"value="{{App\Models\Cart::TotalPrice()}}">
						<input type="submit" value="Pay Now" name="proceed" class="btn btn-primary btn-modern text-uppercase mt-5 mb-5 mb-lg-0"id="sslczPayBtn">
					</div>
				</form>
				</div>
				<div class="col-lg-3">
					<h4 class="text-primary">Cart Totals</h4>
					<table class="cart-totals">
						<tbody>
							<tr class="cart-subtotal">
								<th>
									<strong class="text-dark">Cart Subtotal</strong>
								</th>
								<td>
									<strong class="text-dark"><span class="amount">{{App\Models\Cart::TotalPrice()}}</span></strong>
								</td>
							</tr>
							<tr class="shipping">
								<th>
									Shipping
								</th>
								<td>
									Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
								</td>
							</tr>
							<tr class="total">
								<th>
									<strong class="text-dark">Order Total</strong>
								</th>
								<td>
									<strong class="text-dark"><span class="amount">{{App\Models\Cart::TotalPrice()}}</span></strong>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>

	</div>

@endsection
