@extends('layouts.app')
@extends('layouts.kategorije')

@section('content')

<div class="container">
    <br>
    <br>
    @if(Session::has('cart'))
    <br>
    <br>
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
                                        <a href="{{ route('productAddByOne', ['id' => $product['item']['id']]) }}" style="margin:0px 5px 0px 0px;"><button type="button" class="btn btn-primary btn-xs"><span style="font-size:17px;">+</span></button></a>
                                        <a href="{{ route('productReduceByOne', ['id' => $product['item']['id']]) }}" style="margin:0px 5px 0px 5px;"><button type="button" class="btn btn-warning btn-xs"><span style="font-size:17px;">-</span></button></a>
                                        <a href="{{ route('productRemove', ['id' => $product['item']['id']]) }}" style="margin:0px 0px 0px 5px;"><button type="button" class="btn btn-danger btn-xs"><span style="font-size:13px;">Ukloni</span></button></a>
                                        <ul class="dropdown-menu">
                                        <li style="padding: 10px;"><a class="text-primary" href="{{ route('productAddByOne', ['id' => $product['item']['id']]) }}">Dodaj još 1</a></li>
                                        <li style="padding: 10px;"><a class="text-primary" href="{{ route('productReduceByOne', ['id' => $product['item']['id']]) }}">Ukloni 1</a></li>
                                        <li style="padding: 10px;"><a class="text-primary" href="{{ route('productRemove', ['id' => $product['item']['id']]) }}">Ukloni sve</a></li>
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
            <strong>Ukupno: {{ $totalPrice }} KM</strong>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="button" class="btn btn-success">Kupi</button>
        </div>
    </div>
    @else
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Košarica je prazna!</h2>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    @endif
</div>
@endsection