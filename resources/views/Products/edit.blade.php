@extends('layouts.layout')

@section('content')
    <div>
        <div>
            @if($errors->any())
                <ul style="list-style: none; color: rgba(248,48,48,0.81)">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form action="{{route('products.update', ['id' => $product->id])}}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">Product image</label>
                <input type="text" class="form-control" name="img" placeholder="https://..." value="{{$product->img ?? ''}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Product title" value="{{$product->title ?? ''}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Product description" value="{{$product->description ?? ''}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Product price" value="{{$product->price ?? ''}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="text" class="form-control" name="qty" placeholder="Product quantity" value="{{$product->qty ?? ''}}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
