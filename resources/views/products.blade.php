@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            @foreach ($products as $product)
            <div class="card border-secondary float-left" style="width: 18rem; margin: 50px 10px 10px 50px">
                <img class="card-img-top" src="{{ url('images', $product->image) }}" alt="Card image cap" style="height: 220px;">
                <div class="card-body">
                  <h5 class="card-title"><a class="text-primary" href="/products/{{$product->id}}">{{$product->name}}</a></h5>
                  <h6 class="card-title">Cijena: {{ $product-> price}} KM</h6>
                  <hr>
                  <p class="card-text">{{ $product-> details}}</p>
                  <a href="#"><button class="btn btn-primary">Dodaj u košaricu</button></a>
                </div>
            </div>                
            @endforeach
              @extends('layouts.kategorije')
        </div>
    </div>
    <br>
</div>
    <div class="row">
      <div class="col-12 d-flex justify-content-center pt4">
        {{ $products->links() }}
      </div>
    </div>
@endsection