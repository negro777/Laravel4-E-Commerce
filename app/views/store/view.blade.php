@extends('layouts.main')
@section('promo')
<div class="promo"></div>
@stop
@section('content')
    <div class="row">
	<div class="col-md-12 column productbox">

    <h1>{{ $product->title }}</h1>
    <hr>
            
        {{ HTML::image($product->image, $product->title, array('class'=>'img-responsive', 'id'=>'view-img', 'width'=>'60%')) }}
            
            
            <hr>

            <p class="text-justify lead">{{ $product->description }}</p>

            <div>
                <hr>
                <div class="pull-right">
                    {{ Form::open(array('url'=>'store/addtocart')) }}
                {{ Form::hidden('quantity', 1) }}
                {{ Form::hidden('id', $product->id) }}
                    
                    <button type="submit" class="btn btn-primary btn-hg">
                        Add to Cart
                        <span class="btn-tip">{{ Availability::display($product->availability) }}</span>
                    </button>

                    {{ Form::close() }}
                </div>
                <div class="pricetext">
                    <h3> <strong>£{{ $product->price }}</strong>
                    </h3>
                </div>
            </div>

        </div>
        </div>

@stop