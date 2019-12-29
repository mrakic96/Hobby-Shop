@extends('layouts.app')
@extends('layouts.kategorije')

@section('content')
<br>
<br>
<br>
<br>
<div class="card border-secondary mb-3" style="top:20px; left: 80px; margin-bottom:136px !important; max-width: 1000px; max-height:300px">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{ url('images', $product->image) }}" class="card-img" alt="Card image cap" style="height: 280px;">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{$product->name}}</h5>
          <h6 class="card-title">Cijena: {{ $product-> price}} KM</h6>
          <hr>
          <p class="card-text">{{ $product->description }}</p>
          <hr>
          <p class="card-text"><small class="text-muted">Zadnji put ažurirano: {{ $product->updated_at }}</small></p>
        </div>
      </div>
    </div>
  </div>
@endsection