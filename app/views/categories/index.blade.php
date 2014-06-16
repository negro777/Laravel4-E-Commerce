@extends('layouts.main')
@section('promo')
<div class="promo"></div>
@stop

@section('content')
<h1>Categories Admin Panel</h1>
<hr>

<p class="lead">Here you can view, delete, and create new categories.</p>
<p class="text-justify">
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. An dolor longissimus quisque miserrimus, voluptatem non optabiliorem diuturnitas facit? Itaque hic ipse iam pridem est reiectus; Sine ea igitur iucunde negat posse se vivere? Quae autem natura suae primae institutionis oblita est? Videmus igitur ut conquiescere ne infantes quidem possint. Stoici scilicet. Miserum hominem! Si dolor summum malum est, dici aliter non potest. Duo Reges: constructio interrete. Quos quidem tibi studiose et diligenter tractandos magnopere censeo.
</p>
<h2>Manage Catagories</h2><hr>

<div class="row">
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>
						Category
					</th>
					<th>
						Created at
					</th>
					<th>
						Delete
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
					<td>{{ $category->name }}</td>
					<td>{{$category->created_at}}</td>
					<td>
					{{ Form::open(array('url'=>'admin/categories/destroy')) }}
					{{ Form::hidden('id', $category->id) }}
					{{ HTML::decode(Form::button('<span class="glyphicon glyphicon-remove"></span> Delete', array('type'=>'submit', 'class'=>'btn btn-danger'))) }}
					{{ Form::close() }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


<h2>Create New Category</h2>
<hr>
<div class="row">
	<div class="col-md-8">
@if($errors->has())
	<p><strong>The following errors have occurred:</strong>
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

		{{ Form::open(array('url'=>'admin/categories/create', 'class'=>'form-inline')) }}
		
		{{ Form::text('name', null, array('class'=>'form-control input-hg', 'placeholder'=>'Name')) }}
		
		{{ HTML::decode(Form::button('<span class="glyphicon glyphicon-plus"></span> Create Category', array('type'=>'submit', 'class'=>'btn btn-hg btn-success'))) }}
		
	{{ Form::close() }}
	</div>
</div>
<!-- end admin -->
@stop