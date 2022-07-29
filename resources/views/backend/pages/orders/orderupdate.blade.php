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
      <h6 class="br-section-label"> Order Update</h6>
      <div class="bd bd-gray-300 rounded">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('order.update',$orderupdate->id)}}" method="post">
                        @csrf
                        @method('put')
                         <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input type="text"name="first_name"value="{{$orderupdate->first_name}}"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text"name="last_name"value="{{$orderupdate->last_name}}"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text"name="email"value="{{$orderupdate->email}}"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Phone</label>
                                    <input type="text"name="phone"value="{{$orderupdate->phone}}"class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="address">Shipping Address</label>
                                    <input type="text"name="address"value="{{$orderupdate->address}}"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">District</label>
                                    <select name="district_id" id="district_id"class="form-control">
                                        <option class="diviid" value="">Select District Name</option>
                                        @foreach ($districts as $district)
                                            <option value="{{$district->id}}"
                                                @if($district->id==$orderupdate->district_id)
                                                selected
                                                @endif
                                                >{{$district->district_name}}</option>
                                            @endforeach
                                      </select>
                                    {{-- <input type="text"name="last_name"value="{{$orderupdate->last_name}}"class="form-control"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="name">Division</label>
                                    <select name="division_id" id="divistion_id"class="form-control">
                                        <option class="diviid" value="">Select Division Name</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{$division->id}}"
                                                @if($division->id==$orderupdate->division_id)
                                                selected
                                                @endif
                                                >{{$division->name}}</option>
                                            @endforeach
                                      </select>
                                    {{-- <input type="text"name="email"value="{{$orderupdate->email}}"class="form-control"> --}}
                                </div>
                                {{-- <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text"name="country"value="{{$orderupdate->country}}"class="form-control">
                                </div> --}}
                                <div class="form-group">
                                    <label for="post_code">Zip Code</label>
                                    <input type="text"name="post_code"value="{{$orderupdate->post_code}}"class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="adminnote">Admin Note</label>
                                    <textarea name="admin_note" id="adminnote" cols="35" rows="3">{{$orderupdate->admin_note}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="post_code">Update Order Status</label>
                                    <select name="status" class="form-control">
                                        <option value="0"@if($orderupdate->status==0) selected @endif>In Processiong</option>
                                        <option value="1"@if($orderupdate->status==1) selected @endif>On Hold</option>
                                        <option value="2"@if($orderupdate->status==2) selected @endif>Complated</option>
                                        <option value="3"@if($orderupdate->status==3) selected @endif>Canceled</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit"name="submit"value="update Status"class="btn btn-teal btn-block mg-b-10">
                                </div>
                            </div>
                    </div>
                </form>
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