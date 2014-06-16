@extends('layouts.main')
@section('promo')
<div class="promo"></div>
@stop

@section('content')
<h1>Shopping Cart & Checkout</h1>
<hr>
@if(Cart::totalItems()>0)


    <div class="row">
       
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th>Product</th>
                        <th class="text-center hidden-xs">Qty</th>
                        <th class="text-center hidden-xs">Price</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Remove</th>
                        

                    </tr>
                </thead>
                <br>
                <tbody>                
                    @foreach($products as $product)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left hidden-xs" href="view/{{ $product->id }}">
                                    {{ HTML::image($product->image, $product->name, array('class'=>'media-object', 'width'=>'72px', 'height'=>'72px')) }}
                                </a>
                                <div class="media-body">
                                    <p class="media-heading">
                                        <a href="view/{{ $product->id }}">{{ $product->name }}</a>
                                    </p>

                                    <span>Status:</span>
                                    <span class="{{ Availability::statusClass($product->
                                        availability) }}"> <strong>{{ Availability::display($product->availability) }}</strong>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="col-sm-1 col-md-1 text-center hidden-xs">                  
                       {{ $product->quantity }}
                        </td>

                        <td class="col-sm-1 col-md-1 text-center hidden-xs"> <strong>£{{ $product->price }}</strong>
                        </td>
                        
                        <td class="col-sm-1 col-md-1 text-center">
                            <strong>£{{ Cost::productTotal($product->price, $product->quantity) }}</strong> 
                        </td>
                        <td class="col-sm-1 col-md-1 text-center">
                            <a href="/store/removeitem/{{ $product->
                                identifier }}">
                                <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="hidden-xs"></td>
                        <td class="hidden-xs"> </td>
                        <td class="hidden-xs"></td>
                        <td>
                            <h5>Subtotal</h5>
                        </td>
                        <td class="text-right">
                            <h5>
                                <strong>£{{ Cart::total() }}</strong>
                            </h5>
                        </td>
                    </tr>

                    <tr>
                        <td class="hidden-xs"></td>
                        <td class="hidden-xs"></td>
                        <td class="hidden-xs"></td>
                        <td>
                            <h3>Total</h3>
                        </td>
                        <td class="text-right">
                            <h3>
                                <strong>£{{ Cart::total() }}</strong>
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden-xs"></td>
                        <td class="hidden-xs"></td>
                        <td class="hidden-xs"></td>
                        <td class="hidden-xs">
                            <a href="/">
                            <button type="button" url="/" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                Continue Shopping
                            </button>
                        </a>
                    </td>

                    <td>
                    <a href="order">
                        <button type="button" url="order" class="btn btn-success">                        
                            Checkout
                            <span class="glyphicon glyphicon-play"></span>
                        </button>
                    </a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>



 @else
    <p class="lead text-justify">There are no items in your cart!</p>
   


@endif
@stop