@extends('layout.layout')
@section('content')
<div class="container w-100 h-100">
    @include('layout/navbar')
    @include('layout/jumbroton')
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card my-5">
                    <a href="{{ route('product.show', $product->id) }}">
                        <div class="view overlay">
                            <img class="card-img-top rounded-0"
                                src="{{ asset('img/'.$product->slug.'.jpg') }}"
                                alt="card image cap">
                            <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-body">
                    <div class="collapse-content text-center">
                        <p class="card-text ">{{ $product->name }}</p>
                        <p class="card-text ">{{ $product->price }}</p>
                    </div>
                </div>
            </div>
    </div>
    @endforeach
    <a href="/shop" class=" btn btn-primary btn-lg btn-block mb-3">More</a>
</div>
</div>
@include('layout/footer')
@endsection