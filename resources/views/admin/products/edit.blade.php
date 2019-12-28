@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Edit product {{ $product->name }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.products.update', $product) }}" method="POST">

                        @csrf
                        {{ method_field('PUT') }}
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="roles" class="col-md-2 col-form-label text-md-right">Slug</label>

                            <div class="col-md-6">
                                @foreach ($products as $product)
                                    <div class="form-check">
                                    <input type="radio" name="slug[]" value="{{ $product->id }}"
                                    @if ($product->pluck('id')->contains($product->id)) checked @endif>
                                    <label>{{ $product->slug }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="details" class="col-md-2 col-form-label text-md-right">Details</label>

                            <div class="col-md-6">
                                <textarea id="details" class="form-control @error('details') is-invalid @enderror" name="details" required autofocus>{{ $product->details }}</textarea>

                                @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autofocus>{{ $product->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- CHANGE CATEGORY --}}
                        {{-- {{ $product -> category_id }}
                        <div class="form-group row">
                                {{ Form::label('category_id', 'Category', ['class' => 'col-md-2 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'Select']) }}
                            </div>
                        </div> --}}
                        
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
