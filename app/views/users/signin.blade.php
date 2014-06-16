@extends('layouts.main')
@section('promo')
<div class="promo"></div>
@stop

@section('content')
<h1><span class="glyphicon glyphicon-user"></span> Sign in to your account</h1>
<div class="row">
    <div class="col-md-4">
    {{ Form::open(array('url'=>'users/signin')) }}
    <p>{{ Form::text('email', null, array('class'=>'form-control input-hg', 'placeholder'=>'Email')) }}</p>
    <p>{{ Form::password('password', array('class'=>'form-control input-hg', 'placeholder'=>'Password')) }}</p>
    {{ Form::button('Login', array('type'=>'submit', 'class'=>'btn btn-hg btn-primary')) }}
    {{ Form::close() }}
    </div>
    <div class="col-md-8">
        <p class='lead text-justify'>Don't have an account yet? You can create an account in just a few simple steps.</p>
        {{HTML::link('users/newaccount', 'Click here to begin')}}

    </div>
</div>

@stop