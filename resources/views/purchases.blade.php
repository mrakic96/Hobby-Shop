@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <br>
            <h2>Moje narudžbe</h2>
            <hr>
            @foreach ($orders as $order)
            <br>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($order->cart->items as $item)
                        <li class="list-group-item">
                        <span style="font-size:15px;">Cijena:&nbsp&nbsp</span><span class="badge badge-secondary" style="font-size:15px;">{{ $item['price'] }} KM</span>&nbsp&nbsp&nbsp&nbsp
                        <span style="font-size:15px;"> Naziv proizvoda:&nbsp</span> <span class="text-primary" style="font-size:17px;">{{ $item['item']['name'] }}</span> &nbsp &nbsp|&nbsp &nbsp<span style="font-size:15px;">Količina:&nbsp</span> <span class="text-primary" style="font-size:17px;"><strong>{{ $item['qty'] }} </strong></span> 
                        </li>
                        @endforeach
                    </ul>
                </div>
                <br>
                <div class="panel-footer">
                <strong>Ukupna cijena: {{ $order->cart->totalPrice }} KM</strong>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection