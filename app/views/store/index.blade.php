@extends('layouts.main')

@section('promo')
<div class="promo">
  <div class="row">

    <div class="col-md-12 hidden-xs">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="item active">
            {{ HTML::image('images/slide1.jpg', 'First slide') }}
            <div class="carousel-caption">
              <h3>Smartphones</h3>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="item">
            {{ HTML::image('images/slide2.jpg', 'First slide') }}
            <div class="carousel-caption">
              <h3>Tablets</h3>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="item">
            {{ HTML::image('images/slide3.jpg', 'First slide') }}
            <div class="carousel-caption">
              <h3>Desktp & Laptops</h3>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control"
                        href="#carousel-example-generic" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
      <div class="main-text hidden-xs hidden-sm">
        <div class="col-md-12 text-center">
          <h1>E-Com</h1>
          <h3 style="color:white;">For all your desktop and mobile computing needs</h3>
          <div class="">
            @if(Auth::check())          

            @else
            {{ HTML::link('users/signin', 'Login', array('class'=>'btn btn-hg btn-primary btn-wide')) }}
            {{ HTML::link('users/newaccount', 'Registration', array('class'=>'btn btn-hg btn-primary btn-wide')) }}

            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="push"></div>
@stop

@section('content')

<h1>Welcome to E-Com</h1>
<hr>
<p class="lead text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quid ad utilitatem tantae pecuniae? Primum cur ista res digna odio est, nisi quod est turpis? Expressa vero in iis aetatibus.</p>
<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quae duo sunt, unum facit. Ut aliquid scire se gaudeant? Frater et T. Prioris generis est docilitas, memoria; Invidiosum nomen est, infame, suspectum. Tum ille timide vel potius verecunde: Facio, inquit.</p>
<h2>New Products</h2>
<hr>
<div class="row">
  @foreach($products as $product)
  <div class="col-md-6">
    <a href="/store/view/{{ $product->id }}">
        {{ HTML::image($product->image, $product->title, array('class'=>'img-responsive')) }}
    </a>
    <h3>
    {{ $product->title }}
    </h3>
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
      <div class="pricetext"><p><strong>£{{ $product->price }}</strong></p></div>
      <hr>
    </div>
  </div>
  @endforeach
</div>
<!-- end products -->
@stop