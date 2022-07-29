@extends('backend.layouts.app')
@section('title','Order')
@section('style')
    
<link href="{{asset('public/backend/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('public/backend/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
@endsection
@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Manage Order</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Manage Order</h6>
      <div class="bd bd-gray-300 rounded">
 
            <div class="row">
                <div class="col-lg-12">
                  @if($orders->count()==0)
                
                <div class="alert alert-info">Sorry No Order Records Found..!</div>
                  @else
                  <table class="table table-bordered table-striped mg-b-0">
                    <thead>
                        <tr>
                        <th scope="col">+SL</th>
                        <th scope="col">Name</th>
                        <th scope="col" >Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Order Details</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach ($orders as $key=>$order)
                        <tr role="row" class="odd">
                        <td>{{$key + 1}}</td>
                        <td>{{$order->first_name}} {{$order->last_name}}</td>
                        <td>
                            {{$order->email}}
                        </td>
                        <td>
                            {{$order->phone}}
                        </td>
                        <td>
                            {{$order->address}}
                        </td>
                        <td>
                            <a href="{{route('order.details',$order->id)}}"class="btn btn-sm btn-primary">see details</a>
                        </td>
                        <td>
                            <a href="{{route('order.edit',$order->id)}}"><i class="fa-solid fa-pen-to-square"></i></a> 
                            {{-- | 
                            <button class="btn btn-sm btn-danger "type="button"onclick="deleteOrder({{$order->id}})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <form id="delete-form-{{$order->id}}" action="{{route('order.destroy',$order->id)}}" method="post"style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form> --}}
    
                        </td>
                        </tr>
                    @endforeach
    
                    </tbody>
                </table>
                  @endif
                  
                </div>
            </div>

    
      </div>
       </div>
      </div><!-- table-wrapper -->



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