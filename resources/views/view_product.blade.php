@extends('layouts.app')

@section('content')
<br>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('products') }}">Svi proizvodi</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Po kategorijama</a>
    <div class="dropdown-menu" style="">
      <a class="dropdown-item" href="{{ route('olovke') }}">Olovke</a>
      <a class="dropdown-item" href="{{ route('kistovi') }}">Kistovi</a>
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
</ul>
<br>
<br>
<div class="card border-secondary mb-3" style="top:20px; margin-bottom:136px !important; max-width: 1000px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{ url('images', $product->image) }}" class="card-img" alt="Card image cap" style="height: 280px;">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-primary">{{$product->name}}</h5>
          <h6 class="card-title">Cijena: {{ $product-> price}} KM</h6>
          <hr>
          <p class="card-text">{{ $product->description }}</p>
          {{-- @can('only-logged-user-see') --}}
          @if($product->stock > 0)
            <a href="{{ route('addToCart', ['id' => $product->id]) }}"><button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Dodaj u košaricu</button></a>
          @endif
            @if($product->stock == 0)
            <button class="btn btn-secondary" disabled><i class="fas fa-shopping-cart"></i> Nije dostupno</button>
            @endif
          {{-- @endcan --}}
          <hr>
          <p class="card-text"><small class="text-muted">Zadnji put ažurirano: {{ $product->updated_at }}</small></p>
        </div>
      </div>
    </div>
  </div>
@endsection