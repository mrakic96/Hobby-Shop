@extends('layouts.app')
@extends('layouts.kategorije')

@section('content')

<div class="container">
    <br>
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h3>{{ Auth::user()->name }}, hvala što kupujete kod nas!</h3>
        <br>
        <p class="text-primary">Odabrali ste <span class="badge badge-secondary"> {{ Session::get('cart')->totalQty }} </span> proizvoda, ukupna cijena: <strong class="text-secondary">{{ Session::get('cart')->totalPrice }} KM</strong></p>
        </div>
    </div>
    <hr style="width:750px;">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('finishedCheckout') }}"><button class="btn btn-primary" type="button">Potvrdi kupovinu</button></a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
</div>
@endsection