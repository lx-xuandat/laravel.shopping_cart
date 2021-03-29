@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <h1>Shop index</h1>

    <div class="row mb-3">
        @for ($i = 0; $i < 100; $i++)
            <div class="col-sm-3 mt-3">
                <div class="card">
                    <img src="https://salt.tikicdn.com/cache/280x280/ts/product/fc/7b/b0/88008acfabf8bbc7a6a7276025b19fab.jpg"
                        class="img-reponsive card-img-top cart-thumbnail" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <div>
                            <div class="price float-left">$12</div>
                            <a href="#" class="btn btn-primary float-right">Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
