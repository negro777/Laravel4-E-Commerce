@extends('layouts.main')
@section('promo')
<div class="promo"></div>
@stop
@section('content')

	<div id="new-account">

		<h1><span class="glyphicon glyphicon-user"></span> Create New Account</h1>

		@if($errors->has())
		<div id="form-errors">

			<p><strong>The following errors have occurred:</strong></p>

			<ul class="list-unstyled">
				@foreach($errors->all() as $error)
					
					<li><p class="text-danger"><span class="glyphicon glyphicon-remove"></span> {{ $error }}</p></li>
				@endforeach
			</ul>
		</div><!-- end form-errors -->
		@endif
		<div class="row">
		<div class="col-md-4">
		{{ Form::open(array('url'=>'users/create')) }}

		<p>
			
			{{ Form::text('firstname', null, array('class'=>'form-control input-hg', 'placeholder'=>'Firstname')) }}
		</p>
		<p>
			
			{{ Form::text('lastname', null, array('class'=>'form-control input-hg', 'placeholder'=>'Lastname')) }}
		</p>
		<p>
			
			{{ Form::text('email', null, array('class'=>'form-control input-hg', 'placeholder'=>'Email')) }}
		</p>
		<p>
			
			{{ Form::password('password', array('class'=>'form-control input-hg', 'placeholder'=>'Password')) }}
		</p>
		<p>
			
			{{ Form::password('password_confirmation', array('class'=>'form-control input-hg', 'placeholder'=>'Re-Type Password')) }}
		</p>
		<p>
			
			{{ Form::text('telephone', null, array('class'=>'form-control input-hg', 'placeholder'=>'Telephone')) }}
		</p>
		{{ Form::submit('Create Account', array('class'=>'btn btn-hg btn-primary')) }}
		{{ Form::close() }}
		</div>
		<div class="col-md-8">
		<p class="lead text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quid ad utilitatem tantae pecuniae? Primum cur ista res digna odio est, nisi quod est turpis? Expressa vero in iis aetatibus.</p>
		<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quid ad utilitatem tantae pecuniae? Primum cur ista res digna odio est, nisi quod est turpis? Expressa vero in iis aetatibus.</p>
		<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quid ad utilitatem tantae pecuniae? Primum cur ista res digna odio est, nisi quod est turpis? Expressa vero in iis aetatibus.</p>
		<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quid ad utilitatem tantae pecuniae? Primum cur ista res digna odio est, nisi quod est turpis? Expressa vero in iis aetatibus.</p>
		</div>
		</div>

	</div><!-- end new-account -->

@stop