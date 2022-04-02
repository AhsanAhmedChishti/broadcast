<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{$seo->meta_keys}}">
        <meta name="author" content="GeniusOcean">

        <title>{{$gs->title}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('assets/print/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/print/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/print/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/print/css/style.css')}}">
  <link href="{{asset('assets/print/css/print.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}"> 
  <style type="text/css">
@page { size: auto;  margin: 0mm; }
@page {
  size: A4;
  margin: 0;
}
@media print {
  html, body {
    width: 210mm;
    height: 287mm;
  }

html {

}
::-webkit-scrollbar {
    width: 0px;  /* remove scrollbar space */
    background: transparent;  /* optional: just make scrollbar invisible */
}
  </style>
</head>
<body onload="window.print();">

    <div class="table-responsive">
        <table class="table">
                                            <tr>
                                                <th width="50%">{{__('Payment Number')}}</th>
                                                <td>{{$order->order_number}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{__('Auction')}}</th>
                                                <td>{{$order->auction->title}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{__('Payment Method')}}</th>
                                                <td>{{$order->method}}</td>
                                            </tr>
                                            @if($order->seller_opening_fee != 0)
                                            <tr>
                                                <th>{{__('Opening Fee')}}</th>
                                                <td>{{ number_format($order->seller_opening_fee, 2, ',', '.') }}</td>
                                            </tr>
                                            @endif
                                            @if($order->seller_feature_amount != 0)
                                            <tr>
                                                <th>{{__('Feature Auction Amount')}}</th>
                                                <td>{{ number_format($order->seller_feature_amount, 2, ',', '.') }}</td>
                                            </tr>
                                            @endif
                                            @if($order->seller_payment_fee != 0)
                                            <tr>
                                            <th>{{__('Payment Fee')}} ({{$gs->payment_fee}}%)</th>
                                                <td>{{ number_format($order->seller_payment_fee, 2, ',', '.') }}</td>
                                            </tr>
                                            @endif
                                            @if($order->seller_vat != 0)
                                            <tr>
                                                <th>{{__('VAT')}} ({{$gs->auction_vat}}%)</th>
                                                <td>{{ number_format($order->seller_vat, 2, ',', '.') }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th>{{__('Total Cost')}}</th>
                                                <td>{{ number_format($order->pay_amount, 2, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('Transaction ID')}}</th>
                                                <td>{{$order->txnid}}</td>
                                            </tr>
                                            @if($order->charge_id != null)
                                            <tr>
                                                <th>{{__('Charge ID')}}</th>
                                                <td>{{$order->charge_id}}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th>{{__('Payment Status')}}</th>
                                                <td>{{$order->payment_status}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{__('Customer Email')}}</th>
                                                <td>{{$order->customer_email}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{__('Customer Name')}}</th>
                                                <td>{{$order->customer_name}}</td>
                                            </tr>


                                            <tr>
                                                <th>{{__('Customer Phone')}}</th>
                                                <td>{{$order->customer_phone}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{__('Customer Address')}}</th>
                                                <td>{{$order->customer_address}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{__('Customer City')}}</th>
                                                <td>{{$order->customer_city}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{__('Customer Zip')}}</th>
                                                <td>{{$order->customer_zip}}</td>
                                            </tr>


                                            <tr>
                                                <th>{{__('Paid at')}}</th>
                                                <td>{{date('d M. Y, H:i',strtotime($order->created_at))}}</td>
                                            </tr>

                                            
                                        </table>

                                        </div>
<script type="text/javascript">
setTimeout(function () {
        window.close();
      }, 500);
</script>

</body>
</html>