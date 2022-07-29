<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{Auth::user()->name}}</title>
    <link rel="stylesheet" href="{{asset('public/frontend/css/invoice/style.css')}}" media="all" />
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        body {
  position: relative;
  width: 21cm;
  height: 17.7cm;
  margin: 0 auto;
  color: #001028;}
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{asset('public/frontend/img/logo-flat.png')}}">
      </div>
      <h1>INVOICE</h1>
      <div id="company" class="clearfix">
        <div>Invoice No : {{$orderInvoice->id}}</div>
        <div>Porto E-Commerce</div>
        <div>455 Street Name,<br /> City Name, Dhaka Bangladesh</div>
        <div>(+88) 01746620369</div>
        <div><a href="example@gmail.com">example@gmail.com</a></div>
        <div>Transction ID : <span>{{$orderInvoice->transaction_id}}</span></div>
      </div>
      <div id="project">
      
        <div> {{$orderInvoice->first_name}} {{$orderInvoice->last_name}}</div>
        <div> {{$orderInvoice->address}}</div>
        <div>{{$orderInvoice->district->district_name}}, {{$orderInvoice->division->name}}, {{$orderInvoice->country}}</div>
        <div>{{$orderInvoice->post_code}}</div>
        <div>{{$orderInvoice->email}}</div>
        <div>{{$orderInvoice->phone}}</div>
        <div>{{$orderInvoice->updated_at}}</div>
      
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">#SL</th>
            <th class="desc">Product Title</th>
            <th>Rate</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Cart::orderBy('id','asc')->where('order_id',$orderInvoice->id)->get() as $key=>$productdetails)
                     
          <tr>
            <td class="service">{{$key + 1}}</td>
            <td class="desc">{{$productdetails->product->title}}</td>
            <td class="unit">{{$productdetails->unit_price}}</td>
            <td class="qty">{{$productdetails->quantity}}</td>
            <td class="total">{{$productdetails->quantity * $productdetails->unit_price}}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">{{$orderInvoice->amount}}</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">00.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total"> Total Amount</td>
            <td class="grand total">{{$orderInvoice->amount}}</td>
          </tr>
        </tbody>
      </table>
        
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>