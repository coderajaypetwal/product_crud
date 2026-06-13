@extends('layouts.app')
@section('content')
<div class="container">
    <a class="btn btn-primary" href="{{ route('products.index') }}">Back To Home </a>
    <h2 class="mt-3">Add Product</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" name="description" value="{{ old('description') }}" placeholder="Description">
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}" placeholder="Price">
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="number" name="stock" value="{{ old('stock') }}" placeholder="Stock">
        @error('stock')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="file" name="image" value="" placeholder="Product Image">
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
