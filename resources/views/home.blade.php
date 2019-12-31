@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-secondary mb-3" style="top:80px; margin-bottom:170px !important;">
                <div class="card-header">Dobrodošli!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <br>
                    <p>{{Auth::user()->name}}, uspješno ste se ulogirali!</p>
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
