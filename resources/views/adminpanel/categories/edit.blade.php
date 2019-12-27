@extends('layouts.adminpanellayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin: 40px 0px 0px 60px;">
            <div class="card-header" style="font-size:26px;">Izmijeni kategoriju '{{ $category->name }}'</div>
                <br>
                <div class="card-body">
                    <form action="{{ route('adminpanel.categories.update', $category) }}" method="POST">

                        @csrf
                        {{ method_field('PUT') }}
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Naziv</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">
                            Potvrdi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
