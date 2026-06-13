@extends('layouts.app')
@section('content')

<div class="container">
        <a class="btn btn-primary" href="{{ route('products.index') }}">Back To Home </a>
        <h2 class="mt-3">Edit Product</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <div>
            <input type="text" name="name" value="{{ $product->name }}" placeholder="Name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <label for="description">Description:</label>
        <div>
            <input type="text" name="description" value="{{ $product->description }}" placeholder="Description">
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <label for="price">Price:</label>
        <div>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}" placeholder="Price">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <label for="stock">Stock:</label>
        <div>
            <input type="number" name="stock" value="{{ $product->stock }}" placeholder="Stock">
            @error('stock')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <img src="{{ asset('uploads/products/' . $product->image) }}" width='100px' height='100px'>
        <br>
        <label for="image">Product Image:</label>
        <div>
            <input type="file" name="image" placeholder="Product Image">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
