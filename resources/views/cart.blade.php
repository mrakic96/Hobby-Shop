@extends('layouts.app')

@section('content')

<div class="container">
    @if(Session::has('cart'))
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{ route('products') }}"><button type="button" class="btn btn-primary float-left"><i class="fas fa-arrow-left"></i> Nazad u trgovinu</button></a>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                        {{-- @can('only-logged-user-see') --}}
                            <th scope="col">Opcije</th>
                        {{-- @endcan --}}
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                            <th scope="row"><span class="badge badge-primary">{{ $product['qty'] }}</span></th>
                                <td><strong>{{ $product['item']['name'] }}</strong></td>
                                <td><span class="label label-success">{{ $product['price'] }}</span> KM</td>
                                <td><img class="card-img-top" src="{{ url('images', $product['item']['image']) }}" alt="Card image cap" style="height: 50px; width:60px;"></td>
                                <td>
                                    <div class="btn-group">
                                        @if($product['stock'] > $product['qty'])
                                        <a href="{{ route('productAddByOne', ['id' => $product['item']['id']]) }}" style="margin:0px 5px 0px 0px;"><button type="button" title="Povećajte količinu" class="btn btn-primary"><i class="fas fa-plus"></i></button></a>
                                        @endif
                                        <a href="{{ route('productReduceByOne', ['id' => $product['item']['id']]) }}" style="margin:0px 5px 0px 5px;"><button type="button" title="Smanjite količinu" class="btn btn-warning"><i class="fas fa-minus"></i></button></a>
                                        <a href="{{ route('productRemove', ['id' => $product['item']['id']]) }}" style="margin:0px 0px 0px 5px;"><button type="button" title="Uklonite proizvod" class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></button></a>
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
        <div class="col-md-12">
            <strong class="float-right">Ukupno: {{ $totalPrice }} KM</strong>
        </div>
    </div>
    <hr>
    @if($product['stock'] >= $product['qty'])
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a class="float-right" href="{{ route('checkout') }}"><button type="button" class="btn btn-success">Kupi</button></a>
        </div>
    </div>
    @endif
    @if($product['stock'] < $product['qty'])
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="alert alert-warning float-right">
            <h4 class="alert-heading">Upozorenje!</h4>
            <p class="mb-0">Nemamo toliko proizvoda, <br> molimo vas da smanjite količinu <br> kako bi nastavili sa kupovinom.</p>
          </div>
        </div>
    </div>
    @endif
    <hr>
    <br>
    <br>
    @else
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('products') }}"><button type="button" class="btn btn-primary float-left"><i class="fas fa-arrow-left"></i> Nazad u trgovinu</button></a>
        </div>
    </div>
    <br>
    <br>
    <div class="alert alert-light">
        <h4 class="alert-heading">Vaša košarica je prazna!</h4>
        <p class="mb-0">Vratite se nazad kako bi odabrali proizvode.</p>
    </div>
    <br>
    <br>
    
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