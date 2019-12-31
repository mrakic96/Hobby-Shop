@extends('layouts.adminpanellayout')

@section('content')
<div class="container">
    <br>
    <br>
    <div class="row justify-content-center">
        <a href="{{ route('adminpanel.categories.create') }}"><button type="button" class="btn btn-primary float-lg-left" style="margin:0px 0px 0px 205px">Nova kategorija</button></a>
    </div>
    <br>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin:0px 0px 0px 200px">
                <div class="card-header" style="font-size:26px;">Kategorije</div>
                <br>
                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
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
