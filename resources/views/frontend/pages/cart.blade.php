@extends('frontend.layouts.template')
@section('title','picabo')
@section('style')
	<style>
button.remove {
    border: none;
}
input.btn.btn-xl.btn-light.pr-4.pl-4.text-2.font-weight-semibold.text-uppercase {
    padding: 1px 9px;
}
#header .header-nav-features .header-nav-features-cart .mini-products-list li .product-details .btn-remove {
    z-index: 3;
    top: 6px;
    right: -5px;
    width: 20px;
    height: 20px;
    background-color: #fff;
    color: #474747;
    border-radius: 100%;
    position: absolute;
    text-align: center;
    box-shadow: 0 2px 3px 0 rgb(0 0 0 / 20%);
    line-height: 20px;
    font-size: 10px;
}

	</style>
@endsection
@section('body-content')
			<div role="main" class="main shop py-4">

				<div class="container">

					<div class="row">
						<div class="col">

							<div class="featured-boxes">
								<div class="row">
									<div class="col">
										<div class="featured-box featured-box-primary text-left mt-2">
											<div class="box-content">
												{{-- <form method="post" action=""> --}}
													<table class="shop_table cart">
														<thead>
															<tr>
																<th class="product-remove">
																	&nbsp;
																</th>
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
																<th class="product-quantity">
																	
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
																<td class="product-remove">
																	<form action="{{route('cart.destroy',$item->id)}}" method="post">
																		@csrf
																		@method('delete')
																		<button type="submit"title="Remove this item" class="remove" href="#">
																			<i class="fas fa-times"></i>
																		</button>
																	</form>
																</td>
																<td class="product-thumbnail">
																	<a href="{{route('productdetails',$item->product->slug)}}">
																		<img width="100" height="100" alt="" class="img-fluid" src="{{asset('public/backend/img/products/'.$item->product->images->first()->image)}}">
																	</a>
																</td>
																<td class="product-name">
																	<a style="text-decoration:none;"href="{{route('productdetails',$item->product->slug)}}">{{$item->product->title}}</a>
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
																<form action="{{route('cart.update',$item->id)}}" method="post" class="cart">
																	@csrf
																	@method('put')
																<td class="product-quantity">
																		<div class="quantity">
																			<input type="button" class="minus" value="-">
																			<input type="text" class="input-text qty text" title="Qty" value="{{$item->quantity}}" name="quantity" min="1" step="1">
																			<input type="button" class="plus" value="+">
																		</div>
																</td>
																<td>
																	<div class="form-row">
																		<div class="form-group col">
																			<input type="submit" value="Update" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase">
																		</div>
																	</div>
																</td>
															</form>
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
												{{-- </form> --}}
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="featured-boxes">
								<div class="row">
									
									<div class="col-sm-6 offset-sm-6">
										<div class="featured-box featured-box-primary text-left mt-3 mt-lg-4">
											<div class="box-content">
												<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Cart Totals</h4>
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

							</div>

							<div class="row">
								<div class="col">
									<div class="actions-continue">
										<a href="{{route('checkout')}}" class="btn btn-primary btn-modern text-uppercase">Proceed to Checkout <i class="fas fa-angle-right ml-1"></i></a>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>

	@endsection
