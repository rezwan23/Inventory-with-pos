@extends('layouts.pos')
@section('title', 'POS')
@section('head')
    <link href="{{asset('/inpos/css/jquery-ui.minb.css')}}" rel="stylesheet">
    <link href="{{asset('/inpos/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
    <link href="{{asset('/inpos/plugins/jquery-spinner/css/bootstrap-spinner.css')}}" rel="stylesheet">
    <style>
        .lds-ellipsis {
            display: inline-block;
            position: relative;
            width: 64px;
            height: 11px;
        }
        .lds-ellipsis div {
            position: absolute;
            top: 0px;
            width: 11px;
            height: 11px;
            border-radius: 50%;
            background: #009688;
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }
        .lds-ellipsis div:nth-child(1) {
            left: 6px;
            animation: lds-ellipsis1 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(2) {
            left: 6px;
            animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(3) {
            left: 26px;
            animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(4) {
            left: 45px;
            animation: lds-ellipsis3 0.6s infinite;
        }
        @keyframes lds-ellipsis1 {
            0% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }
        @keyframes lds-ellipsis3 {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(0);
            }
        }
        @keyframes lds-ellipsis2 {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(19px, 0);
            }
        }
    </style>
    @endsection
@section('footer')
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <form action="{{route('sellInvoice.show')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="amount_payable">Amount Payable</label>
                                <div class="form-line">
                                    <input type="text" id="amount_payable" class="form-control" disabled>
                                    <input type="hidden" name="amount_payable" id="total_payable">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid_by">Paid By</label>
                                <select class="form-control show-tick" name="account_id">
                                    @foreach($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="amount_paid">Amount Paid</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Amount Paid" id="amount_paid" name="amount_paid">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="note">Note</label>
                                <div class="form-line">
                                    <textarea class="form-control" placeholder="Note.." id="note" name="note"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customer">Customer <span><a href="{{route('customer.create')}}" target="_blank" class="btn btn-primary">Add New Customer</a></span></label>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Customer Mobile No." id="customer_no" name="customer_no">
                                </div>
                            </div>
                                <button class="btn btn-primary" type="submit">Show Invoice</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('inpos/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('inpos/plugins/jquery-spinner/js/jquery.spinner.js')}}"></script>
    <script src="{{asset('inpos/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('inpos/js/pos-scripts.js')}}"></script>

    <script>
        $('aside#leftsidebar').addClass('m-l--300');
        $('section.content').addClass('m-l-15');
        $('.left_text').addClass('m-l-55');
        $('#sidebarMenuSwitch span').removeClass('rotated');
    </script>
    @endsection
@section('content')
    {{csrf_field()}}
    <div class="row clearfix">
        <div class="col-md-4">
            <div class="row" id="messageDiv" style="display: none">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <a class="close" href="javascript:void(0);" onclick="closeMessage();">x</a>
                        <strong>Success! </strong><span id="message"></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header loader-div">
                    <h2 style="display: inline-block;">
                        Cart 
                    </h2>
                    <div class="lds-ellipsis m-l-25" style="display: none"><div></div><div></div><div></div><div></div></div>
                </div>
                <div class="body">
                    <div class="carts">
                        <div id="tblDiv">
                            @if(count($carts)>0)
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($carts as $cart)
                                        <tr id="cartRow">
                                            <th scope="row">{{$cart->name}}</th>
                                            <td>{{$cart->cart_quantity}}</td>
                                            <td>{{$cart->retail_price*$cart->cart_quantity}}</td>
                                            <td>
                                                <a href="javascript:void(0);" class="col-red" id="deleteCartItem">
                                                    <i class="material-icons">delete</i>
                                                    <input type="hidden" value="{{$cart->cart_id}}" id="cartId">
                                                    <input type="hidden" value="{{$cart->item_id}}" id="itemId">
                                                    <input type="hidden" value="{{$cart->cart_quantity}}" id="itemQuantity">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="totalInfo clearfix m-t-20 b-t b-b p-t-10 p-b-10">
                                <div class="totalDiv">
                                    <p class="title">Total = <span class="amount">{{$total}}</span></p>
                                    <p class="title">Vat = <span class="amount">{{$vat}}</span></p>
                                    <p class="title">Amount to be paid = <span class="amount" id="amountToBePaid">{{$total + $vat}}</span></p>
                                </div>
                            </div>
                            <div class="m-b-10 m-r-10 p-t-10 clearfix" style="display: block;">
                                <a href="javascript:void(0);" id="delallcart" class="btn btn-danger m-r-10">Suspend</a>
                                <a href="javascript:void(0);" id="paymentbtn" class="btn btn-success">Payment</a>
                            </div>
                            @else
                                <p>Select Items</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="border-bottom" style="padding: 15px 15px 0px 15px;">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group" style="margin-bottom: 0px;">
                                <div class="form-line">
                                    <input class="form-control" onkeyup="myFunction();" placeholder="Search Product Item Here" type="text" name="produceitem" id="myInput">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div id="itemswrapper">
                        <div class="row" id="allItems">
                            @foreach($items as $item)
                            <div class="col-md-4 col-sm-6" id="singleItem">
                                <div class="card clearfix">
                                    <div class="itemwrapper text-center">
                                        <div id="itemSingle">
                                            <input type="hidden" id="itemid" value="{{$item->id}}">
                                            <input type="hidden" id="itemName" value="{{$item->name}}">
                                            <h2>{{$item->name}}</h2>
                                            <img src="{{asset('/images/items/'.$item->image)}}" alt="">
                                            <p class="price">Price: {{$item->retail_price}} BDT (<span id="stock" class="quantity">{{$item->quantity}}</span>)</p>
                                            <div class="row">
                                                <div class="col-sm-12 margin-0" style="margin-bottom: 0px;">
                                                    <div class="left_text m-l-25">
                                                        <label for="quantity">Quantity</label>
                                                    </div>
                                                    <div class="right_text">
                                                        <div class="input-group spinner" data-trigger="spinner" style="margin-bottom: 5px;">
                                                            <div class="form-line">
                                                                <input class="form-control margin-0 text-center" id="itemquantity" type="text" name="item_quantity"  value="0" data-rule="quantity" style="font-weight: 700;margin-bottom:0px;width: 50px;">
                                                            </div>
                                                            <span class="input-group-addon">
                                                            <a href="javascript:;" class="spin-up" data-spin="up"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                                            <a href="javascript:;" class="spin-down" data-spin="down"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 text-center" style="margin-bottom: 10px;">
                                                    <a class="btn bg-teal" id="addToCartBtn">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection