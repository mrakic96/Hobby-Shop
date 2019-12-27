@extends('layouts.adminpanellayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin: 40px 0px 0px 60px;">
            <div class="card-header" style="font-size:26px;">Izmijeni korisnika '{{ $user->name }}'</div>
                <br>
                <div class="card-body">
                    <form action="{{ route('adminpanel.users.update', $user) }}" method="POST">

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Ime</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @csrf
                        {{ method_field('PUT') }}
                        @can('edit-roles')
                        <div class="form-group row">
                            <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>

                            <div class="col-md-6">
                                @foreach ($roles as $role)
                                    <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                    @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                    <label>{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endcan
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
