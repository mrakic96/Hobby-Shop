<style>
    .dropdown1 {
      position: relative;
      top: 20px;
      left:205px;
      /* display: inline-block; */
    }
    
    .dropdown-content1 {
      display: none;
      position:absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content1 a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    
    .dropdown-content1 a:hover {background-color: #fff;}
    
    .dropdown1:hover .dropdown-content1 {display: block;}
    
    .dropdown1:hover .dropbtn1 {background-color: #218491;}
    </style>
@extends('layouts.adminpanellayout')

@section('content')
<div class="container">
    <br>
    <br>
    <div class="row justify-content-center">
        <a href="{{ route('adminpanel.products.create') }}"><button type="button" class="btn btn-primary float-lg-left" style="margin:0px 0px 0px 205px">Novi proizvod</button></a>
        <div class="dropdown1">
            <button class="btn btn-primary float-lg-left">Po kategorijama</button>
            <div class="dropdown-content1">
                <a href="{{ route('adminpanel.products.olovke') }}">Olovke</a>
                <a href="{{ route('adminpanel.products.kistovi') }}">Kistovi</a>
                <a href="{{ route('adminpanel.products.platna') }}">Platna</a>
            </div>
        </div>
    <br>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin:0px 0px 0px 200px">
                <div class="card-header" style="font-size:26px;">Platna</div>
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
<br>
<div class="row">
    <div class="col-12 d-flex justify-content-center pt4" style="margin-left:270px;">
      {{ $products->links() }}
    </div>
  </div>
@endsection
