@extends('layouts.app')
@extends('layouts.kategorije')

@section('content')
<br>
<br>
<br>
<br>
    @cannot('only-logged-user-see')
      <div class="alert alert-dismissible alert-info" style="width:650px; margin-left:80px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          Da biste kupili naše proizvode, morali bi se <a href="{{ route('login') }}" class="alert-link">prijaviti</a> ili <a href="{{ route('register') }}" class="alert-link">registrirati</a> ukoliko nemate račun.
      </div>
    @endcannot
<div class="card border-secondary mb-3" style="top:20px; left: 80px; margin-bottom:136px !important; max-width: 1000px; max-height:300px">
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
            <a href="{{ route('addToCart', ['id' => $product->id]) }}"><button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Dodaj u košaricu</button></a>
          {{-- @endcan --}}
          <hr>
          <p class="card-text"><small class="text-muted">Zadnji put ažurirano: {{ $product->updated_at }}</small></p>
        </div>
      </div>
    </div>
  </div>
@endsection