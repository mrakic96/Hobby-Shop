@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                        @can('edit-users')
                            <th scope="col">Actions</th>
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
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                                    @endcan
                                    {{-- @can('delete-users')
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="float-left">
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
