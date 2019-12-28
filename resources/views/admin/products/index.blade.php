@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <a href="{{ route('admin.products.create') }}"><button type="button" class="btn btn-primary float-lg-left">Add a new product</button></a>
    </div>
    <br>
    <hr>
    <div class="row justify-content-center">
        <div class="col">
            @foreach ($products as $product)
            <div class="card float-left" style="width: 18rem; margin: 50px 10px 10px 50px">
            <img class="card-img-top" src="{{ url('images', $product->image) }}" alt="Card image cap" style="height: 220px;">
                <div class="card-body">
                  <h5 class="card-title">{{ $product-> name}}</h5>
                  <h6 class="card-title">Cijena: {{ $product-> price}} KM</h6>
                  <hr>
                  <p class="card-text">{{ $product-> details}}</p>

                  <a href="{{ route('admin.products.edit', $product->id) }}"><button type="button" class="btn btn-primary float-lg-left" style="margin-right:10px">Edit</button></a>
                  <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="float-left">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-warning">Delete</button>
                  </form>
                </div>
            </div>                
            @endforeach
            
        </div>
    </div>
</div>
@endsection
