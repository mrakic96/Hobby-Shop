@extends('layouts.adminpanellayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
                  <!-- search -->
<form action="{{route('adminpanel.users.search')}}" methog="GET" class="search-form">
<div class="container">
    <div class="row">
        <div class="col-12">
            <br>
       <div id="custom-search-input">
                <div class="input-group">
                    <input type="text" name="query" id="query" style="width: 190px;border-radius:8px 0px 0px 8px;" value="{{ request()-> input('query')}}" class="form-control" placeholder="Pretraga">
                    <a href="{{route('search')}}"><button class="btn btn-outline-secondary" style="border-left:0px; margin-bottom:0px; height:54px; border-radius:0px 8px 8px 0px; border-color:#ced4da" value="{{ request()-> input('query')}}"><i class="fas fa-search" style="color:#ced4da"></i></button></a>
                </div>
        </div>
          </div>
    </div>  
</div>
</form>
<!-- search -->
            <div class="card" style="margin:40px 0px 0px 0px">
                <br>
                <div class="card-header" style="font-size:26px;">Korisnici</div>
                <br>
                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ime</th>
                            <th scope="col">Email</th>
                            <th scope="col">Uloge</th>
                            <th scope="col">Opcije</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                            <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                    @can('edit-users')
                                    <a href="{{ route('adminpanel.users.edit', $user->id) }}"><button type="button" class="btn btn-primary float-left">Izmjena</button></a>
                                    @endcan
                                </td>
                                <td>
                                    @can('delete-users')
                                    <form action="{{ route('adminpanel.users.destroy', $user) }}" method="POST" class="float-left">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-warning">Izbriši</button>
                                    </form>
                                    @endcan
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
<div class="row">
    <div class="col-12 d-flex justify-content-center pt4" style="margin-left:370px;">
      {{ $users->links() }}
    </div>
</div>
@endsection
