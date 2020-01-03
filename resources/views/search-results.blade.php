@extends('layouts.app')
@section('content')
<div class="container">
  <div class="preloader">
  </div>
  <br>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link active" href="#">Svi proizvodi</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Po kategorijama</a>
      <div class="dropdown-menu" style="">
        <a class="dropdown-item" href="{{ route('olovke') }}">Olovke</a>
        <a class="dropdown-item" href="{{ route('kistovi') }}">Kistovi</a>
        <a class="dropdown-item" href="{{ route('platna') }}">Platna</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('about') }}">O nama</a>
    </li>
    @can('manage-products')
    <li class="nav-item">
    <a class="nav-link" href="{{ route('adminpanel.users.index') }}" target="_blank">Admin panel</a>
    </li>
    @endcan
  </ul>
    <div class="row justify-content-center">
        <div class="col-md-12">
          <br>
          <h1>Rezultati</h1>
          <p>{{$products->count()}} rezultat(a) za '{{ request()->input('query')}}'</p>
          <div class="card">
          <div class="card-body">
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Naziv</th>
                            <th scope="col">Cijena</th>
                            <th scope="col">Detalji</th>
                            <th scope="col">Opis</th>
                            <th scope="col">Slika</th>
                            @can('manage-products')
                            <th scope="col">Opcije</th>
                            @endcan
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>              
                                <td><a class="text-primary" href="/products/{{$product->id}}">{{$product->name}}</a></td>
                                <td>{{ $product-> details}}</td>
                                <td>{{ $product-> price}} KM</td>
                                <td>{{ $product-> description}}</td>
                                <td><img class="card-img-top" src="{{ url('images', $product->image) }}" alt="Card image cap" style="height: 40px; width: 40px;"></td>
                                @can('manage-products')
                                <td> 
                                    <a href="{{ route('adminpanel.products.edit', $product->id) }}">
                                        <button type="button" class="btn btn-primary float-lg-left"  style="margin-right:10px;">Izmjena</button>
                                    </a>
                                    <form action="{{ route('adminpanel.products.destroy', $product) }}" method="POST" class="float-left">
                                      @csrf
                                      {{ method_field('DELETE') }}
                                     <button type="submit" class="btn btn-warning">Izbriši</button>
                                     </form>
                                </td>
                                @endcan
                            </tr>
                        @endforeach
                          
                        </tbody>
                      </table>
                </div>
              </div>
        </div>
    </div>
    <br>
</div>
@endsection