@extends('layouts.adminpanellayout')

@section('content')



<div class="row">
    <div class="col-md-8 col-md-offset-0">
        <br>
        <br>
        <h3>Novi proizvod</h3>
        {!! Form::open(['route' => 'adminpanel.products.store', 'method' => 'post', 'files' => true]) !!}

        <div class="form-group">
            {{ Form::label('name', 'Naziv') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('details', 'Detalji') }}
            {{ Form::text('details', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Opis') }}
            {{ Form::textarea('description', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('price', 'Cijena') }}
            {{ Form::number('price', null, ['class' => 'form-control','step' => '0.01']) }}
        </div>
        <div class="form-group">
            {{ Form::label('stock', 'Količina') }}
            {{ Form::number('stock', null, ['class' => 'form-control','step' => '1']) }}
        </div>
        <div class="form-group">
            {{ Form::label('category_id', 'Kategorija') }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Odaberi']) }}
        </div>

        <div class="form-group">
            {{ Form::label('image', 'Slika') }}
            {{ Form::file('image', array('class' => 'form-control')) }}
        </div>
        <br>
        {{ Form::submit('Potvrdi', array('class' => 'btn btn-primary')) }}

        {!! Form::close() !!}
    </div>
</div>

@endsection