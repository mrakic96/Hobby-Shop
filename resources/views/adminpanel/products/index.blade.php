@extends('layouts.adminpanellayout')

@section('content')
<div class="container">
    <br>
    <br>
    <div class="row justify-content-center">
        <a href="{{ route('adminpanel.products.create') }}"><button type="button" class="btn btn-primary float-lg-left" style="margin:0px 0px 0px 65px">Novi proizvod</button></a>
    </div>
    <br>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin:0px 0px 0px 60px">
                <div class="card-header" style="font-size:26px;">Proizvodi</div>
                <br>

                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
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
                            <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product-> name}}</td>
                                <td>Cijena: {{ $product-> price}} KM</td>
                                <td><img class="card-img-top" src="{{ url('images', $product->image) }}" alt="Card image cap" style="height: 50px;"></td>
                                <td> 
                                    <a href="{{ route('adminpanel.products.edit', $product->id) }}">
                                        <button type="button" class="btn btn-primary float-lg-left">Izmjena</button>
                                    </a>
                                </td>
                                <td> 
                                    <form action="{{ route('adminpanel.products.destroy', $product) }}" method="POST" class="float-left">
                                     @csrf
                                     {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-warning">Izbriši</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
