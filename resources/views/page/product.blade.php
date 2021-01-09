@extends('layout.layout')
@section('title', 'Product')  
@section('content')
<div class="container">
    @include('layout.navbar')
    <div class="row my-5">
        <div class="col-md-6">
            <img class="card-img-top rounded-0"
                src="{{ asset('img/'.$product->slug.'.jpg') }}"
                alt="Card image cap">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p>${{ $product->price }}</p>

            <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <button class="btn btn-secondary mb-3" type="submit"> Add to cart
                    <i class="fa fa-cart-plus" aria-hidden="true"></i> </button>
            </form>

            <p>{{ $product->description }} </p>
            <p>Made in Vancouver, BC</p>
        </div>
    </div> 
</div>
@include('layout.footer')
@endsection