@extends('layouts.main')

@section('promo')
<div class="promo">
    
</div>
@stop

@section('content')
<h1>{{ $category->name }}</h1>
<hr>
<section id="links">
    
        <div class="row">
            <div class="col-lg-12">
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        @foreach($catnav as $cat)
                        <li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        <hr>
 </section>
<!-- end categories-menu -->

@if(count($products) === 0)
<p class="lead text-justify">Sorry there are no products listed under "{{ $category->name }}" </p>
@else
    <div class="row">
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
    @endif
    @stop

@section('pagination')
<div class="pagination pagination-lg pagination-centered">
<ul>{{ $products->links() }}</ul>
</div>

    @stop







