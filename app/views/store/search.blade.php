@extends('layouts.main')
@section('promo')
<div class="promo"></div>
@stop

@section('search-keyword')

    @if($keyword == null)

    <h1>
        Search Results for <span >"all"</span>
    </h1>
    
    @else
    

    <h1>
        Search Results for <span>"{{ $keyword }}"</span>
    </h1>

    @endif
    <hr>

<!-- end search-keyword -->
@stop

@section('content')


<div id="search-results">
    @foreach($products as $product)
        <div class="col-md-6 column productbox">
            <a href="/store/view/{{ $product->
                id }}">
        {{ HTML::image($product->image, $product->title, array('class'=>'img-responsive')) }}
            </a>
            <h3>{{ $product->title }}</h3>
            <hr>

            <p class="text-justify">{{ $product->description }}</p>

            <div>
                <hr>
                <div class="pull-right">
                    {{ Form::open(array('url'=>'store/addtocart')) }}
                {{ Form::hidden('quantity', 1) }}
                {{ Form::hidden('id', $product->id) }}
                    <button type="submit" class="btn btn-primary">
                        Add to Cart
                        <span class="btn-tip">{{ Availability::display($product->availability) }}</span>
                    </button>
                    {{ Form::close() }}
                </div>
                <div class="pricetext">
                    <p> <strong>£{{ $product->price }}</strong>
                    </p>
                </div>
                <hr></div>

        </div>
        @endforeach
</div>
<!-- end search-results -->
@stop