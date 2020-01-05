@extends('layouts.app')

@section('content')
    <div class="container">   
        <div class="card border-secondary mb-3" style="top:60px; left:250px; margin-bottom:136px !important; max-width: 500px; max-height:500px">
            <div class="row no-gutters">
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Korisnički profil</h5>
                  <hr>
                  <br>
                  <h6 class="card-title"><span style="font-size:16px;">Ime:</span> {{ Auth::user()->name }}</h6>
                  <h6 class="card-title"><span style="font-size:16px;">Email:</span> {{ Auth::user()-> email}} </h6>
                  <br>
                  <a href="{{ route('edit-profile', Auth::user()->id) }}"><button type="button" class="btn btn-primary float-left">Uredi ime i email</button></a>
                  <a href="{{ route('change-password')}}"><button type="button" class="btn btn-danger float-left" style="margin-left:15px;">Promijeni lozinku</button></a>
                  <a href="{{ route('purchases')}}"><button type="button" class="btn btn-primary float-left" style="margin-top:15px;">Transakcije</button></a>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <hr>
                  <p class="card-text"><small class="text-muted">Zadnji put ažuriran: {{ Auth::user()->updated_at }}</small></p>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection