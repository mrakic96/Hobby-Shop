@extends('layouts.app')

@section('content')
    
<div>
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
      <a class="nav-link active" href="#">O nama</a>
    </li>
    @can('manage-products')
    <li class="nav-item">
    <a class="nav-link" href="{{ route('adminpanel.users.index') }}" target="_blank">Admin panel</a>
    </li>
    @endcan
  </ul>
</div>
<br>
<div class="bg-light">
    <div class="container py-5">
      <div class="row h-100 align-items-center py-5">
        <div class="col-lg-6">
          <h1 class="display-4">O nama</h1>
          <p class="lead text-muted mb-0"></p>
          <p class="lead text-muted">
            Hobby Shop je aplikacija namijenjena za online kupovinu. <br>
            Na izradi ovog projekta su sudjelovali Anton Viskić i Matej Rakić.
          </p>
        </div>
        <div class="col-lg-6 d-none d-lg-block"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834136/illus_kftyh4.png" alt="" class="img-fluid"></div>
      </div>
    </div>
  </div>
  
  <div class="bg-white py-5">
    <div class="container py-5">
      <div class="row align-items-center mb-5">
        <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
          <h2 class="font-weight-light">Github repozitorij</h2>
          <p class="font-italic text-muted mb-4">Na našem remote repozitoriju se nalazi cijeli source code projekta. Tu se također nalaze i uputstva za preuzimanje i korištenje ove aplikacije.</p><a href="https://github.com/mrakic96/Hobby-Shop" target="_blank" class="btn btn-light px-5 rounded-pill shadow-sm">Github</a>
        </div>
        <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834139/img-1_e25nvh.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-5 px-5 mx-auto"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834136/img-2_vdgqgn.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
        <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
          <h2 class="font-weight-light">Vizija projekta i DB schema</h2>
          <p class="font-italic text-muted mb-4">Pored github repozitorija, naš projekt ima viziju i schemu MySQL baze koje možete preuzeti klikom na gumbove ispod.</p><a href="{{ asset('download/Vizija.pdf') }}" download class="btn btn-light px-5 rounded-pill shadow-sm">Preuzmite viziju</a><a href="{{ asset('download/Hobby_Shop_MySql_Schema.zip') }}" download class="btn btn-light px-5 rounded-pill shadow-sm" style="margin-left:15px;">Preuzmite schemu</a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="bg-light py-5">
    <div class="container py-5">
      <div class="row mb-4">
        <div class="col-lg-5">
          <h2 class="display-4 font-weight-light">Studenti</h2>
          <p class="font-italic text-muted">Studenti koji su radili na ovom projektu.</p>
        </div>
      </div>
  
      <div class="row text-center">
        
  
        <!-- Team item-->
        <div class="col-xl-3 col-sm-6 mb-5" style="margin-left: 270px;">
          <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-2_f8dowd.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Matej Rakić</h5><span class="small text-uppercase text-muted">1461/RR</span>
            {{-- <ul class="social mb-0 list-inline mt-3">
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
            </ul> --}}
          </div>
        </div>
        <!-- End-->

        <!-- Team item-->
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-2_f8dowd.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Anton Viskić</h5><span class="small text-uppercase text-muted">1608/RR</span>
            {{-- <ul class="social mb-0 list-inline mt-3">
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
            </ul> --}}
          </div>
        </div>
        <!-- End-->
  
        
      
  
      </div>
    </div>
  </div>

  @endsection