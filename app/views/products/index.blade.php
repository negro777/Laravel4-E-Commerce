@extends('layouts.main')

@section('promo')
<div class="promo"></div>
@stop

@section('content')
<div id="admin">

	<h1>Products Admin Panel</h1>
	<hr>

	<p class="lead">Here you can view, delete, and create new products.</p>
	<p class="text-justify">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. De quibus cupio scire quid sentias. Nulla profecto est, quin suam vim retineat a primo ad extremum. Beatum, inquit. Tubulum fuisse, qua illum, cuius is condemnatus est rogatione, P. Quantum Aristoxeni ingenium consumptum videmus in musicis? Callipho ad virtutem nihil adiunxit nisi voluptatem, Diodorus vacuitatem doloris. Profectus in exilium Tubulus statim nec respondere ausus; Cur id non ita fit? Duo Reges: constructio interrete. Tum Piso: Quoniam igitur aliquid omnes, quid Lucius noster? Quod non faceret, si in voluptate summum bonum poneret.
	</p>

	<h2>Products</h2>
	<hr>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>id</th>
						<th>image</th>
						<th>Product</th>
						<th>Price</th>
						<th>Update Stock</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product)
					<tr>
						<th>{{ $product->id }}</th>
						<td>
							{{ HTML::image($product->image, $product->title, array('width'=>'50')) }}
						</td>
						<td>{{ $product->title }}</td>
						<td>£ {{ $product->price }}</td>
						<td>
							{{ Form::open(array('url'=>'admin/products/toggle-availability', 'class'=>'form-inline'))}}
							{{ Form::hidden('id', $product->id) }}
							{{ Form::select('availability', array('1'=>'In Stock', '0'=>'Out of Stock'), $product->availability) }}
							{{ HTML::decode(Form::button('
							<span class="glyphicon glyphicon-ok"></span>
							Update', array('type'=>'submit', 'class'=>'btn btn-success'))) }}
							{{ Form::close() }}
						</td>
						<td>
							{{ Form::open(array('url'=>'admin/products/destroy', 'class'=>'form-inline')) }}
						{{ Form::hidden('id', $product->id) }}
						{{ HTML::decode(Form::button('
							<span class="glyphicon glyphicon-remove"></span>
							Delete', array('type'=>'submit', 'class'=>'btn btn-danger'))) }}
						{{ Form::close() }}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<h2>Create New Product</h2>
	<hr>

	<div class="row">
		<div class="col-md-8">
			@if($errors->has())
			<p> <strong>The following errors have occurred:</strong>
			</p>

			<ul class="list-unstyled">
				@foreach($errors->all() as $error)
				<li>
					<p class="text-danger">
						<span class="glyphicon glyphicon-remove"></span>
						{{ $error }}
					</p>
				</li>
				@endforeach
			</ul>

			<!-- end form-errors -->
			@endif

		{{ Form::open(array('url'=>'admin/products/create', 'files'=>true)) }}
			<p>
			{{ Form::select('category_id', $categories) }}
			</p>
			<p>
			{{ Form::text('title', null, array('class'=>'form-control input-hg', 'placeholder'=>'Title')) }}
			</p>
			<p>
			{{ Form::textarea('description', null, array('class'=>'form-control input-hg', 'placeholder'=>'Description')) }}
			</p>
			<p>
			{{ Form::text('price', null, array('class'=>'form-control input-hg', 'placeholder'=>'Price')) }}
			</p>
			<p>
			<span class="btn btn-primary btn-file">Browse {{ Form::file('image') }}</span>
			<span id="path"></span>
			</p>
			{{ HTML::decode(Form::button('<span class="glyphicon glyphicon-plus"></span> Create Product', array('type'=>'submit', 'class'=>'btn btn-hg btn-success'))) }}
		{{ Form::close() }}
		</div>
		<!-- end admin -->
	</div>
</div>
		@stop










