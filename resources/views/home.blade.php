@extends('layouts.app')

@section('content')
<br>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('products') }}">Svi proizvodi</a>
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
            <div class="card border-secondary mb-3" style="top:45px; margin-bottom:170px !important;">
                <div class="card-header">Dobrodošli!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <br>
                    <p>{{Auth::user()->name}}, uspješno ste se ulogirali! Pogledajte vaš <a class="text-primary" href="{{route('profile')}}">korisnički profil</a>.</p>
                    <hr>
                    <p>Želite li vidjeti naš izbor proizvoda? Odaberite <a class="text-primary" href="{{route('products')}}">trgovinu</a>!</p>
                    <p>Pogledajte i više informacija <a class="text-primary" href="{{route('about')}}">o nama</a>.</p>
                    <p>Uživajte!</p>
                    <br>
                    @can('manage-products')
                    <a href="{{route('adminpanel.users.index')}}" target="_blank"><button class="btn btn-primary">Admin panel</button></a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

@endsection
