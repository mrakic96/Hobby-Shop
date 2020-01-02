@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
        <h3>{{ Auth::user()->name }}, hvala Vam što kupujete kod nas!</h3>
        <br>
        <p class="text-primary">Odabrali ste <span class="badge badge-secondary"> {{ Session::get('cart')->totalQty }} </span> proizvoda, ukupna cijena: <strong class="text-secondary">{{ Session::get('cart')->totalPrice }} KM</strong></p>
        </div>
    </div>
    <hr>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('finishedCheckout') }}"><button class="btn btn-primary float-right" type="button">Potvrdi kupovinu</button></a>
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