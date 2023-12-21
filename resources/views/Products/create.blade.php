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
        <form action="{{route('products.store')}}" method="post">
            @csrf
            @method('post')
            <div class="mb-3">
                <label class="form-label">Product image</label>
                <input type="text" class="form-control" name="img" placeholder="https://...">
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Product title">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Product description">
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Product price">
            </div>
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="text" class="form-control" name="qty" placeholder="Product quantity">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
