@extends('layouts.app')
@section('content')
<div class="container">

    <div class="mb-3 btn btn-primary">
        <a href="{{route('products.create')}}" class="text-white text-decoration-none">Add Product</a>
    </div>

    @if(session('success'))
        <p class="alert alert-success">{{session('success')}}</p>
    @endif

    <table class="table table-bordered">
        <tr style="background-color: #f2f2f2; border: 1px solid #ddd;">
            <th>SO.No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
        @if(isset($products))
                @foreach($products as  $value)
                <tr style="background-color: #ffffff;">
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{asset('uploads/products/'.$value->image)}}" width="50px" height="50px"></td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->description}}</td>
                    <td>{{$value->price}}</td>
                    <td>{{$value->stock}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('products.edit',$value->id)}}">Edit</a>
                        <form action="{{route('products.destroy',$value->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <br>
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        @else
            <p>Product Not Found>
        @endif
</table>

</div>
@endsection
