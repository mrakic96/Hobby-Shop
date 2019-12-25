@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            @foreach ($products as $product)
            <div class="card float-left" style="width: 18rem; margin: 50px 10px 10px 50px">
                <img class="card-img-top" src="" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{ $product-> name}}</h5>
                  <h6 class="card-title">{{ $product-> price}}</h6>
                  <p class="card-text">{{ $product-> details}}</p>
                  <a href="{{ route('admin.products.edit', $product->id) }}"><button type="button" class="btn btn-primary float-lg-left">Edit</button></a>
                  <a href="{{ route('admin.products.destroy', $product->id) }}"><button type="button" class="btn btn-warning float-lg-left">Delete</button></a>
                </div>
            </div>                
            @endforeach
            
        </div>
    </div>
</div>
@endsection
