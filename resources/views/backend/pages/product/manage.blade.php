@extends('backend.layouts.app')
@section('title','Product')
@section('style')
    
<link href="{{asset('public/backend/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('public/backend/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
@endsection
@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Manage Product</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Manage Product</h6>
      <div class="table-wrapper">
        <div id="datatable1_wrapper" class="dataTables_wrapper no-footer"><table id="datatable1" class="table display responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable1_info" style="width: 940px;">
          <thead>
            <tr role="row">
              <th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 114px;" aria-label="First name: activate to sort column descending" aria-sort="ascending">+SL</th>
              <th class="wd-15p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 114px;" aria-label="Last name: activate to sort column ascending">Image</th>
              <th class="wd-15p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 114px;" aria-label="Last name: activate to sort column ascending">Title</th>
              <th class="wd-15p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 114px;" aria-label="Last name: activate to sort column ascending">Quantity</th>
              <th class="wd-20p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 175px;" aria-label="Position: activate to sort column ascending">Category</th>
              <th class="wd-15p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 114px;" aria-label="Start date: activate to sort column ascending">Brand</th>
              <th class="wd-10p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 70px;" aria-label="Salary: activate to sort column ascending">Regular_price</th>
              <th class="wd-10p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 70px;" aria-label="Salary: activate to sort column ascending">Offer_price</th>
              <th class="wd-10p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 70px;" aria-label="Salary: activate to sort column ascending">Featured</th>
              <th class="wd-10p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 70px;" aria-label="Salary: activate to sort column ascending">Status</th>
              <th class="wd-10p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 70px;" aria-label="Salary: activate to sort column ascending">Action</th>
            </tr>
          </thead>
          <tbody>
        
         @foreach ($products as $key=>$product)
            <tr role="row" class="odd">
              <td>{{$key + 1}}</td>
              <td>
                @php $j = 1; @endphp
                @foreach ($product->images as $image)
                @if($j > 0)
                    <img src="{{asset('public/backend/img/products/'.$image->image)}}" width="50"alt="image">
                    @endif
                    @php $j--;  @endphp
                @endforeach
           
              </td>
              <td>{{$product->title}}</td>
              <td>{{$product->quantity}} Pcs</td>
              <td>{{$product->category->title}}</td>
              <td>{{$product->brand->name}}</td>
              <td>{{$product->regular_price}}</td>
              <td>
                @if(!empty($product->offer_price))
                {{$product->offer_price}}
                @else
                -N/A-
                @endif
              </td>
              <td>
                @if ($product->is_featured==0)
                    <span class="badge badge-danger">Inactive</span>
                @elseif($product->is_featured==1)
                <span class="badge badge-success">Active</span>
                @endif
                
              </td>
              <td>
                @if ($product->status==0)
                    <span class="badge badge-danger">Inactive</span>
                @elseif($product->status==1)
                <span class="badge badge-success">Active</span>
                @endif
                
              </td>
              <td>
                <a href="{{route('product.edit',$product->id)}}"><i class="fa-solid fa-pen-to-square"></i></a> | 

                <button class="btn btn-danger "type="button"onclick="deleteProduct({{$product->id}})">
              <i class="fa-solid fa-trash"></i>
              </button>
              <form id="delete-form-{{$product->id}}" action="{{route('product.destroy',$product->id)}}" method="post"style="display:none;">
                  @csrf
                  @method('DELETE')
              </form>

              </td>
            </tr>
         @endforeach

          </tbody>
          @if ($products->count()==0)
              <div class="alert alert-info">
                No Product Add Yet. Please Add Product !

              </div>
          @endif
        </table>

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
  function deleteProduct(id){
       
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