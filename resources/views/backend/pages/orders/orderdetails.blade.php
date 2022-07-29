@extends('backend.layouts.app')
@section('title','Order details')
@section('style')
    
<link href="{{asset('public/backend/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('public/backend/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
<style>
  .order-summery-box {
    border: 1px solid #eee;
    padding: 15px;
}

.order-summery-box p {
    margin: 0;
    line-height: 1.8em;
}

.order-summery-box p span {
    width: 96px;
    display: inline-block;
    color: #000;
}
span.badge.badge-info {
    padding: 5px;
    color: #fff;
}
.order-update {
    font-size: 13px;
}
</style>
@endsection
@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Customer Order Details</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-4">
                    <div class="order-summery-box">
                    <h3 class="br-section-label">Customer Information</h3>
                    <p><span>Full Name : </span>{{$orderdetails->first_name}} {{$orderdetails->last_name}}</p>
                    <p><span>Email : </span>{{$orderdetails->email}}</p>
                    <p><span>Phone : </span>{{$orderdetails->phone}}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-summery-box">
                    <h3 class="br-section-label">Transction Details</h3>
                    <p><span>Amount Total : </span>{{$orderdetails->amount}} {{$orderdetails->currency}}</p>
                    <p><span>Transction ID : </span>{{$orderdetails->transaction_id}}</p>
                    <h3 class="order-update">Order Status : <a href="{{route('order.edit',$orderdetails->id)}}"><i class="fa fa-edit"></i>Update Status</a></h3>
                    <p><span> Order Status : </span>
                    @if($orderdetails->status == 0)
                      <span class="badge badge-info">Procissing</span>
                    @elseif($orderdetails->status == 1)
                    <span class="badge badge-warning">On Hold</span>
                    @elseif($orderdetails->status == 2)
                    <span class="badge badge-success">Complated</span>
                    @elseif($orderdetails->status == 3)
                    <span class="badge badge-danger">Canceled</span>
                    @endif
                    </p>
                    </div>
                </div>
                <div class="col-lg-4">
                     <div class="order-summery-box">
                     <h3 class="br-section-label">Shipping Address</h3>
                     <p><span>Shipping Address : </span>{{$orderdetails->address}}</p>
                     <p><span>District : </span>{{$orderdetails->district->district_name}}</p>
                     <p><span>Division : </span>{{$orderdetails->division->name}}</p>
                     <p><span>Country : </span>{{$orderdetails->country}}</p>
                     <p><span>Zip Code : </span>{{$orderdetails->post_code}}</p>
                     </div>
                </div>
              
            </div>

            <div class="row">
              <div class="col-lg-12">
                  <div class="order-product-summery-box">
                  <h3 class="br-section-label">Customer Information</h3>
                  </div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit_Price</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach (App\Models\Cart::orderBy('id','asc')->where('order_id',$orderdetails->id)->get() as $key=>$productdetails)
                      <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>
                          @php $j = 1; @endphp
                          @foreach ($productdetails->product->images as $image)
                          @if($j > 0)
                              <img src="{{asset('public/backend/img/products/'.$image->image)}}" width="50"alt="image">
                              @endif
                              @php $j--;  @endphp
                          @endforeach
                        </td>
                        <td>{{$productdetails->product->title}}</td>
                        <td>{{$productdetails->quantity}}</td>
                        <td>{{$productdetails->unit_price}}</td>
                        <td>{{$productdetails->quantity * $productdetails->unit_price}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
          
            
            
          </div>
          <div class="row">

            <div class="col-lg-6">
                <div class="alert alert-primary text-center">
                <h4>Customer Message</h4>
                <p>{{$orderdetails->message}}</p>
                </div>
            </div>
            <div class="col-lg-6">
              <div class="alert alert-primary text-center">
              <h4>Admin Notes</h4>
              <p>{{$orderdetails->admin_note}}</p>
              </div>
          </div>
        
        </div>
      </div>
 </div>


@endsection
@section('scripts')
<script src="{{asset('public/backend/lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/backend/lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<script src="{{asset('public/backend/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/backend/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('public/backend/lib/moment/min/moment.min.js')}}"></script>
<script src="{{asset('public/backend/lib/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('public/backend/lib/highlightjs/highlight.pack.min.js')}}"></script>
<script src="{{asset('public/backend/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/backend/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
  function deleteOrder(id){
       
              const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
              })

              swalWithBootstrapButtons.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
              }).then((result) => {
              if (result.isConfirmed) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
              } else if (
                  /* Read more about handling dismissals below */
                  result.dismiss === Swal.DismissReason.cancel
              ) {
                  swalWithBootstrapButtons.fire(
                  'Cancelled',
                  'Your Data  is safe :)',
                  'error'
                  )
              }
              })
  }



  $(function(){
    'use strict';

    $('#datatable1').DataTable({
      responsive: true,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
      }
    });

    $('#datatable2').DataTable({
      bLengthChange: false,
      searching: false,
      responsive: true
    });

    // Select2
    $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

  });
</script> 
@endsection