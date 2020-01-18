@extends('layouts.adminpanellayout')

@section('content')


<div class="row">
    <div class="col-md-6 col-md-offset-0">
        <br>
        <br>
        <br>
        <h3>Nova kategorija</h3>

        {!! Form::open(['route' => 'adminpanel.categories.store', 'method' => 'post']) !!}

        <div class="form-group">
            {{ Form::label('name', 'Naziv') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <br>
        {{ Form::submit('Potvrdi', array('class' => 'btn btn-primary')) }}

        {!! Form::close() !!}
    </div>
    
    
</div>

@endsection