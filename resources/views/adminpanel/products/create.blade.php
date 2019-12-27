@extends('layouts.adminpanellayout')

@section('content')

<h3>Add Product</h3>

<div class="row">
    <div class="col-md-8 col-md-offset-3">
        {!! Form::open(['route' => 'admin.products.store', 'method' => 'post', 'files' => true]) !!}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('details', 'Details') }}
            {{ Form::text('details', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('price', 'Price') }}
            {{ Form::number('price', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('category_id', 'Category') }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select']) }}
        </div>

        <div class="form-group">
            {{ Form::label('image', 'Image') }}
            {{ Form::file('image', array('class' => 'form-control')) }}
        </div>
        <br>
        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

        {!! Form::close() !!}
    </div>
    
    
</div>

@endsection