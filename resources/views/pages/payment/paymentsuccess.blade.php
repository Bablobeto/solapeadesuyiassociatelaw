@extends('layouts.app')
@section('title', 'Payment - ')
@section('content')

<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

body {
    background-color: #110501;
    font-family: 'Montserrat', sans-serif
}

.card {
    border: none
}

.logo {
    background-color: #bc6e2c
}

.totals tr td {
    font-size: 13px
}

.footer {
    background-color: #eeeeeea8
}

.footer span {
    font-size: 12px
}

.product-qty span {
    font-size: 12px;
    color: #dedbdb
}
</style>

    @include('components.navbar')

<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-left logo p-2 px-5"> <img src="https://i.imgur.com/2zDU056.png" width="50"> 
                    <span class="pull-right text-white">PURCHASE INVOICE</span>
                    <button style="float: right; color: #FFF; margin-top: 10px;" class="btn btn-success" onclick="javascript:window.print()">Download</button>
                </div>
                <div class="invoice p-5">
                    <h3>Solape Adesuyi and Associate</h5>
                    <h5>Your order Confirmed!</h5> <span class="font-weight-bold d-block mt-4">Hello, {{ $invoice->name }}</span> <span>You order has been confirmed and will be shipped within two weeks!</span>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                @if($invoice->item != "all_books")
                                <tr>
                                    <td colspan="4">
                                        <div class="py-2"> <span class="d-block text-muted">Item Purchased</span> 
                                            <span>{{ $invoice->item }}</span> 
                                        </div>
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="4">
                                        <div class="py-2"> <span class="d-block text-muted">Item 1 Purchased</span> 
                                            <span>Your Business And The Law</span> 
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <div class="py-2"> <span class="d-block text-muted">Item 2 Purchased</span> 
                                            <span>Your Bussiness Legal Companion</span> 
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order Date</span> <span>{{ date('d M, Y') }}</span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order No</span> <span>{{ $invoice->reference }}</span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Payment</span> <span><img src="{{ asset('images/mastercard.png') }}" width="20" /></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Shiping Address</span> <span>{{ $invoice->address }}</span> </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tbody class="totals">
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Cost</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span>N{{ number_format($invoice->cost, 2) }}</span> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Quantity</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span>{{ $invoice->quantity }} each</span> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Subtotal</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span>N{{ number_format($invoice->cost * $invoice->quantity, 2) }}</span> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Shipping Fee</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span>N{{ number_format($invoice->shipping, 2) }}</span> </div>
                                        </td>
                                    </tr>
                                    <tr class="border-top border-bottom">
                                        <td>
                                            <div class="text-left"> <span class="font-weight-bold">Total</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span class="font-weight-bold">N{{ number_format($invoice->amount, 2) }}</span> </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>We will be sending shipping confirmation email when the item is shipped successfully!</p>
                    <p class="font-weight-bold mb-0">Thanks for placing an order!</p> <span>Solape Adesuyi And Associate</span>
                </div>
                <div class="d-flex justify-content-between footer p-3"> <span>Need Help? visit our <a href="https://solapeadesuyiassociatelaw.com/contact/"> help center</a></span> <span>{{ date('d M, Y') }}</span> </div>
            </div>
        </div>
    </div>
</div>


@endsection
