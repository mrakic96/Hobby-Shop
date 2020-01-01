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
        <h2>{{ Auth::user()->name }}, hvala Vam na kupovini!</h2>
        {{-- <p>Kupili ste {{ Session::get('cart')->totalQty }} proizvoda, ukupna cijena: {{ Session::get('cart')->totalPrice }} KM</p> --}}
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