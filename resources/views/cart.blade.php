@extends('layouts.app')
@extends('layouts.kategorije')

@section('content')

<div class="container">
    <br>
    <br>
    @if(Session::has('cart'))
    <br>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <br>
                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Količina</th>
                            <th scope="col">Naziv</th>
                            <th scope="col">Cijena</th>
                            <th scope="col">Slika</th>
                        @can('manage-products')
                            <th scope="col">Akcije</th>
                        @endcan
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>							
                            <th scope="row"><span class="badge badge-secondary">{{ $product['qty'] }}</span></th>
                                <td><strong>{{ $product['item']['name'] }}</strong></td>
                                <td><span class="label label-success">{{ $product['price'] }}</span> KM</td>
                                <td><img class="card-img-top" src="{{ url('images', $product['item']['image']) }}" alt="Card image cap" style="height: 50px; width:60px;"></td>
                                <td> 
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Smanji za 1</a></li>
                                            <li><a href="#">Izbriši sve</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <strong>Total: {{ $totalPrice }}</strong>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="button" class="btn btn-success">Checkout</button>
        </div>
    </div>
    @else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Košarica je prazna!</h2>
        </div>
    </div>
    @endif
</div>
@endsection