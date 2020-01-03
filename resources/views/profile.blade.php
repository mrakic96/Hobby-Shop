@extends('layouts.app')

@section('content')
    <div class="container">   
        <div class="card border-secondary mb-3" style="top:60px; left:250px; margin-bottom:136px !important; max-width: 500px; max-height:300px">
            <div class="row no-gutters">
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Korisnički profil</h5>
                  <hr>
                  <h6 class="card-title">Ime: {{Auth::user()->name}}</h6>
                  <h6 class="card-title">E-mail: {{ Auth::user()-> email}} </h6>
                  <br>
                  <a href=""><button type="button" class="btn btn-primary float-left">Izmjena</button></a>
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