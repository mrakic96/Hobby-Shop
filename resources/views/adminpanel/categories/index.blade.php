@extends('layouts.adminpanellayout')

@section('content')
<div class="container">
    <br>
    <br>
    <div class="row justify-content-center">
              <!-- search -->
      <form action="{{route('adminpanel.categories.search')}}" methog="GET" class="search-form">
<div class="container">
    <div class="row">
        <div class="col-12">
       <div id="custom-search-input">
                <div class="input-group">
                    <input type="text" name="query" id="query" style="width: 200px;border-radius:8px 0px 0px 8px;" value="{{ request()-> input('query')}}" class="form-control" placeholder="Pretraga">
                    <a href="{{route('search')}}"><button class="btn btn-outline-secondary" style="border-left:0px; margin-bottom:0px; height:54px; border-radius:0px 8px 8px 0px; border-color:#ced4da" value="{{ request()-> input('query')}}"><i class="fas fa-search" style="color:#ced4da"></i></button></a>
           </div>
        </div>
          </div>
    </div>  
    <br>
</div>
</form>
<!-- search -->
        <a href="{{ route('adminpanel.categories.create') }}"><button type="button" class="btn btn-primary float-lg-left">Nova kategorija</button></a>
    </div>
    <br>
    <hr style="margin-left:200px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size:26px;">Kategorije</div>
                <br>
                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Naziv</th>
                        @can('edit-users')
                            <th scope="col">Opcije</th>
                        @endcan
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                            <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @can('edit-users')
                                    <a href="{{ route('adminpanel.categories.edit', $category->id) }}"><button type="button" class="btn btn-primary float-left">Izmjena</button></a>
                                    @endcan
                                    {{-- @can('delete-users')
                                    <form action="{{ route('adminpanel.categories.destroy', $category) }}" method="POST" class="float-left">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-warning">Delete</button>
                                    </form>
                                    @endcan --}}
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
@endsection
