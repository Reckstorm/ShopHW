@extends('layouts.layout')

@section('content')
    <div class="d-flex justify-content-center">
        <h4>
            @if(session()->has('success'))
                <div style="color: limegreen;">
                    {{session('success')}}
                </div>
            @elseif(session()->has('failure'))
                <div style="color: red;">
                    {{session('failure')}}
                </div>
            @endif
        </h4>
    </div>
    <div class="grid-parent-container">
        <div class="grid-image-container m-1">
            <img src="{{ $product->img }}" class="rounded mx-auto d-block"  alt="Missing image">
        </div>
        <div class="m-1">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title">{{ $product->title ?? 'No title provided' }}</h3>
                </div>
                <div>
                    <form action="{{route('products.destroy', ['id' => $product->id])}}" method="post" style="display: inline-block">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Remove" class="btn btn-danger btn-lg">
                    </form>
                    <form action="{{route('products.edit', ['id' => $product->id])}}" method="get" style="display: inline-block">
                        @csrf
                        @method('get')
                        <input type="submit" value="Edit" class="btn btn-warning btn-lg">
                    </form>
                </div>
            </div>

            <p class="card-text">Quantity: {{ $product->qty ?? 'No qty provided' }}</p>
            <p class="card-text">Description:</p>
            <p class="card-text">{{ $product->description ?? 'No description provided' }}</p>
            <h4 class="card-subtitle mb-2 text-body-secondary">Price: {{ $product->price ?? 'No price provided' }}</h4>
            <form action="{{route('products.buy', ['id' => $product->id])}}" method="post">
                @csrf
                @method('put')
                <input type="number" value="1" name="qty" min="0" max="{{ $product->qty ?? '' }}">
                <input type="submit" value="Buy" class="btn btn-primary btn-lg">
            </form>
        </div>
    </div>
@endsection
