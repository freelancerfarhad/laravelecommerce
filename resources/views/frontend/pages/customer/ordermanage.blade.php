@extends('frontend.layouts.template')
@section('title','picabo')
@section('style')
<style>
  .orderPage {
    font-size: 21px;
    font-weight: 400;
}
</style>
@endsection
@section('body-content')
  <div role="main"class="main shop py-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="featured-boxes">
                    <div class="row">
                        <div class="col">
                            <div class="featured-box featured-box-primary text-left mt-2">
                                <div class="box-content">
                                    <!---profile page content area start----->
                                   <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="orderPage">Order Page</h1>
                                    </div>
                                    <div class="container">
                                    <div class="row">
                                        <div class="col-3">
                                          <!-- Tab navs -->
                                          <ul class="nav">
                                            <li class="active"><a data-toggle="tab" href="#home">Order History</a></li>
                                            <li><a data-toggle="tab" href="#menu1">Buy</a></li>
                                          </ul>
                                          <!-- Tab navs -->
                                        </div>
                                      
                                        <div class="col-9">
                                          <!-- Tab content -->
                                          <div class="tab-content">

                                            <div id="home" class="tab-pane fade in active">
                                                <table class="table table-hover table-striped ">
                                             <thead class="thead-dark"style=" white-space: nowrap;">
                                                <tr>
                                                    <th>#SL</th>
                                                    <th>Order Id</th>
                                                    <th>Order Date</th>
                                                    <th>Items</th>
                                                    <th>Total Amount</th>
                                                    <th>Status</th>
                                                    <th>Invoice</th>
                                                </tr>
                                             </thead>
                                                    <tbody>
                                                      @foreach ($orders as $key=>$order)
                                                          
                                                 
                                                      <tr>
                                                        <td>{{$key + 1}}</td>
                                                        <td>{{$order->id}}</td>
                                                        <td>{{$order->updated_at}}</td>
                                                        <td>product </td>
                                                        <td>{{$order->amount}}</td>
                                                        <td>
                                                          @if ($order->status == 0)
                                                          <span class="badge badge-primary">In Progressing</span>
                                                          @elseif($order->status == 1)
                                                          <span class="badge badge-warning">Hold</span>
                                                          @elseif($order->status == 2)
                                                          <span class="badge badge-success">Complated</span>
                                                          @elseif($order->status == 3)
                                                          <span class="badge badge-danger">Canseled</span>
                                                          @endif
                                                          {{-- <span class="badge badge-dark">Return</span> --}}
                                                            
                                                        </td>
                                                        <td><a target="_blank"href="{{route('order-invoice',$order->id)}}">See Your Invoice</a></td>
                                                      </tr>
                                                      @endforeach
                                                    </tbody>
                                                  </table>
                                            </div>

                                         <div id="menu1" class="tab-pane fade">
                                              <h3>Menu 1</h3>
                                              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            </div>
                                          </div>
                                        </div>
                                          <!-- Tab content -->
                                        </div>
                                      </div>
                                   </div>
                                </div>
                                    <!---profile page content area end----->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


@endsection