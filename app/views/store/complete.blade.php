@extends('layouts.main')
@section('promo')
<div class="promo"></div>
@stop

@section('content')
	<h1>Order Complete</h1>
	<hr>
	<p class="lead">Thank you for your order {{ Auth::user()->firstname }}.</p>
	<p>Your order will be processed shortly.</p>
	@stop