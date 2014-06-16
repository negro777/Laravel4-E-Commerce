@extends('layouts.main')
@section('promo')
<div class="promo"></div>
@stop

@section('content')
<h1>Checkout</h1>
<p class="lead">Hello {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <strong>£{{ Cart::total() }}</strong> will be debited from your bank account for the following items:</p>

@if(Cart::totalItems()>0)
	<table>
	
		@foreach($products as $product)
		<tr>
		<td>{{ $product->quantity }} x <a href="view/{{ $product->id }}">{{ $product->name }}</a></td>
			
		</tr>
		@endforeach
	
	</table>

@if($errors->has())
		<div id="form-errors">

			<p><strong>The following errors have occurred:</strong></p>

			<ul class="list-unstyled">
				@foreach($errors->all() as $error)
					
					<li><p class="text-danger"><span class="glyphicon glyphicon-remove"></span> {{ $error }}</p></li>
				@endforeach
			</ul>
		</div>
		@endif
	
	<div class="row">
	{{ Form::open(array('url'=>'orders/create')) }}
	<div class="col-lg-6">
	<h3>Shipping & Billing Address</h3>

	<p>
	{{ Form::text('address', null, array('class'=>'form-control input-hg', 'placeholder'=>'Address')) }}
	</p>

	<p>	
	{{ Form::text('city', null, array('class'=>'form-control input-hg', 'placeholder'=>'City/Town')) }}
	</p>
	
	<p>	
	{{ Form::text('county', null, array('class'=>'form-control input-hg', 'placeholder'=>'County')) }}
	</p>

	<p>	
	{{ Form::text('post_code', null, array('class'=>'form-control input-hg', 'placeholder'=>'Postcode')) }}
	</p>

	</div>

	<div class="col-lg-6">
	<h3>Card Details</h3>
	<p>
	{{ Form::text('card_name', null, array('class'=>'form-control input-hg', 'placeholder'=>'Cardholders Name' )) }}
	</p>

	<p>
	{{ Form::text('card_number', null, array('class'=>'form-control input-hg', 'placeholder'=>'Card Number')) }}
	</p>

	<p>
	{{ Form::text('card_expire', null, array('class'=>'form-control input-hg', 'placeholder'=>'Expire Date')) }}
	</p>

	<p>
	{{ Form::text('card_csv', null, array('class'=>'form-control input-hg', 'placeholder'=>'CSV')) }}
	</p>


	
	</div>
	</div>

	<input type="hidden" name="first_name" value="{{ Auth::user()->firstname }}">
	<input type="hidden" name="last_name" value="{{ Auth::user()->lastname }}">
 	<input type="hidden" name="email" value="{{ Auth::user()->email }}">
 	<input type="hidden" name="products" value="@foreach($products as $product) {{ $product->id }}@endforeach">
 	<input type="hidden" name="total" value="{{ Cart::total() }}">

 	

	<div class="row">
		<div class="col-lg-12">
		{{ Form::submit('Confirm Order', array('class'=>'btn btn-hg btn-primary')) }}
		</div>
	</div>
	{{ Form::close() }}

@endif
@stop