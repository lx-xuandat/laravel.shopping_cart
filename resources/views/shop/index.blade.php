@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <h1>Shop index</h1>
    @foreach ($products->chunk(4) as $productChunk)
        <div class="row mb-3">
            @foreach ($productChunk as $item)
                <div class="col-sm-3 mt-3">
                    <div class="card">
                        <img src="{{ $item->imagePath }}" class="img-reponsive card-img-top cart-thumbnail" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <div>
                                <div class="price float-left">${{ $item->price }}</div>
                                <a href="{{ route('product.addToCart', ['id' => $item->id]) }}"
                                    class="btn btn-primary float-right">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

@endsection
