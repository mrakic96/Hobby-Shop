@extends('layouts.adminpanellayout')

@section('content')

<h3>Add Category</h3>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open(['route' => 'adminpanel.categories.store', 'method' => 'post']) !!}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <br>
        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

        {!! Form::close() !!}
    </div>
    
    
</div>

@endsection