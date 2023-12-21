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
    <div class="d-flex p-2 flex-wrap">
        @foreach($products as $product)
            @include('Products.includings.product', (array)$product)
        @endforeach
    </div>
@endsection
