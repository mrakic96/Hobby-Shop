@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
          @cannot('only-logged-user-see')
          <br>
          <div class="alert alert-dismissible alert-info" style="width:650px; margin-left:52px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          Da biste kupili naše proizvode, morali bi se <a href="{{ route('login') }}" class="alert-link">prijaviti</a> ili <a href="{{ route('register') }}" class="alert-link">registrirati</a> ukoliko nemate račun.
          </div>
          @endcannot
            @foreach ($products as $product)
            <div class="card border-secondary float-left" style="width: 18rem; margin: 50px 10px 10px 50px">
              <a href="/products/{{$product->id}}"><img class="card-img-top" src="{{ url('images', $product->image) }}" alt="Card image cap" style="height: 220px;"></a>
                <div class="card-body">
                  <h5 class="card-title"><a class="text-primary" href="/products/{{$product->id}}">{{$product->name}}</a></h5>
                  <h6 class="card-title">Cijena: {{ $product-> price}} KM</h6>
                  <hr>
                  <p class="card-text">{{ $product-> details}}</p>
                  {{-- @can('only-logged-user-see') --}}
                    <a href="{{ route('addToCart', ['id' => $product->id]) }}"><button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Dodaj u košaricu</button></a>
                  {{-- @endcan                 --}}
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