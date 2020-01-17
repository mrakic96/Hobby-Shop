@extends('layouts.app')
@section('content')
<div class="container">
  <div class="preloader">
  </div>
  <br>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('products') }}">Svi proizvodi</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Po kategorijama</a>
      <div class="dropdown-menu" style="">
        <a class="dropdown-item" href="{{ route('olovke') }}">Olovke</a>
        <a class="dropdown-item active" href="#">Kistovi</a>
        <a class="dropdown-item" href="{{ route('platna') }}">Platna</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('about') }}">O nama</a>
    </li>
    @can('manage-products')
    <li class="nav-item">
    <a class="nav-link" href="{{ route('adminpanel.users.index') }}" target="_blank">Admin panel</a>
    </li>
    @endcan
    <li class="nav-item dropdown" style="margin:auto;">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sortiraj po cijeni</a>
      <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('kistovilow') }}">Od manje</a>
          <a class="dropdown-item" href="{{ route('kistovihigh') }}">Od veće</a>
      </div>
    </li>
  </ul>
    <div class="row justify-content-center">
        <div class="col">
          @cannot('only-logged-user-see')
          <br>
          {{-- <br>
          <div class="alert alert-dismissible alert-info" style="width:650px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          Da biste kupili naše proizvode, morali bi se <a href="{{ route('login') }}" class="alert-link">prijaviti</a> ili <a href="{{ route('register') }}" class="alert-link">registrirati</a> ukoliko nemate račun.
          </div> --}}
          @endcannot
            @foreach ($products as $product)
            <div class="card border-secondary float-left" style="width: 18rem; margin: 50px 50px 10px 0px">
              <a href="{{url('products/'.$product->id)}}"><img class="card-img-top" src="{{ url('images', $product->image) }}" alt="Card image cap" style="height: 220px;"></a>
                <div class="card-body">
                  <h5 class="card-title"><a class="text-primary" href="{{url('products/'.$product->id)}}">{{$product->name}}</a></h5>
                  <h6 class="card-title">Cijena: {{ $product-> price}} KM</h6>
                  <hr>
                  <p class="card-text">{{ $product-> details}}</p>
                  {{-- @can('only-logged-user-see') --}}
                  @if($product->stock > 0)
                    <a href="{{ route('addToCart', ['id' => $product->id]) }}"><button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Dodaj u košaricu</button></a>
                  @endif
                  @if($product->stock == 0)
                  <button class="btn btn-secondary" disabled><i class="fas fa-shopping-cart"></i> Nije dostupno</button>
                  @endif
                  {{-- @endcan                 --}}
                </div>
            </div>                
            @endforeach
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