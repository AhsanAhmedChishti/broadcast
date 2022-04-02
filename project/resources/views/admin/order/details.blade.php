@extends('layouts.admin')
        
@section('content')
    <div class="content-area">
                        <div class="mr-breadcrumb">
                            <div class="row">
                                <div class="col-lg-12">
                                        <h4 class="heading">{{__('Payment Details')}}  <a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a></h4>
                                        <ul class="links">
                                            <li>
                                                <a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}} </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">{{__('Payments')}}</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">{{__('Payment Details')}}</a>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>

                            <div class="add-product-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="product-description">
                                            <div class="body-area">

                                    <div class="table-responsive show-table">
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

                                            @if($order->bid_id != 0)
                                            <tr>
                                                <th>{{__('Bid Price')}}</th>
                                                <td>{{ number_format($order->bid->bid_amount, 2, ',', '.') }}</td>
                                            </tr>
                                            @endif

                                            @if($order->buyer_opening_fee != 0)
                                            <tr>
                                                <th>{{__('Opening Fee')}}</th>
                                                <td>{{ number_format($order->buyer_opening_fee, 2, ',', '.') }}</td>
                                            </tr>
                                            @endif


                                            @if($order->buyer_fee != 0)
                                            <tr>
                                                <th>{{__('Fee')}} ({{$gs->buyer_fee}}%)</th>
                                                <td>{{ number_format($order->buyer_fee, 2, ',', '.') }}</td>
                                            </tr>
                                            @endif


                                            @if($order->buyer_payment_fee != 0)
                                            <tr>
                                            <th>{{__('Payment Fee')}} ({{$gs->buyer_payment_fee}}%)</th>
                                                <td>{{ number_format($order->buyer_payment_fee, 2, ',', '.') }}</td>
                                            </tr>
                                            @endif

                                            @if($order->buyer_vat != 0)
                                            <tr>
                                                <th>{{__('VAT')}} ({{$gs->auction_vat}}%)</th>
                                                <td>{{ number_format($order->buyer_vat, 2, ',', '.') }}</td>
                                            </tr>
                                            @endif


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

                                            <tr class="text-center">
                                                <td colspan="2"><a class="btn sendEmail send" href="javascript:;" class="send" data-email="{{ $order->customer_email }}" data-toggle="modal" data-target="#vendorform"><i class="fa fa-send"></i>{{__('Send Email')}}</a></td>
                                            </tr>
                                            
                                        </table>
                                    </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

<div class="row mt-2">
<div class="col-lg-5">

</div>
<div class="col-lg-4">
<a class="mybtn1" target="_blank" href="{{ route('admin-order-print',$order->id) }}">
    {{__('Print')}}
</a>
</div>
</div>
    

    </div>



{{-- MESSAGE MODAL --}}
<div class="sub-categori">
    <div class="modal" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vendorformLabel">{{__('Send Email')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            <div class="modal-body">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form">
                                <form id="emailreply">
                                    {{csrf_field()}}
                                    <ul>
                                        <li>
                                            <input type="email" class="input-field eml-val" id="eml" name="to" placeholder="{{__('Email')}} *" value="" required="" readonly="">
                                        </li>
                                        <li>
                                            <input type="text" class="input-field" id="subj" name="subject" placeholder="{{__('Subject')}} *" required="">
                                        </li>
                                        <li>
                                            <textarea class="input-field textarea" name="message" id="msg" placeholder="{{__('Your Message')}} *" required=""></textarea>
                                        </li>
                                    </ul>
                                    <button class="submit-btn" id="emlsub" type="submit">{{__('Send Email')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

{{-- MESSAGE MODAL ENDS --}}

@endsection