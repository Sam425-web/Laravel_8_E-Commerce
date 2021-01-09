@extends('layout.layout')
@section('title', 'Cart')  
@section('content')
<div class="container">
    @include('layout.navbar')
    {{-- table --}}
    <div class="row my-5">
        <div class="col-md-8">
            <div>
                @if(session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif
            </div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">My Cart</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Remove</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                @foreach(Cart::content() as $item)
                    <tbody>
                        <tr>
                            <th scope="row">
                                <a href="{{ route('product.show', $item->model->id) }}">
                                    <img src="{{ asset('img/'. $item->model->slug .'.jpg' ) }}"
                                        alt="..." class="img-responsive img-rounded"
                                        style="max-height: 50px; max-width: 50px;">
                                </a>
                            </th>
                            <td><a class="text-white"
                                    href="{{ route('product.show', $item->model->id) }}">{{ $item->model->name }}</a>
                            </td>
                            <td> <select class=" custom-select-sm">
                                    <option selected> 1</option>
                                    <option value="1">2</option>
                                    <option value="2">3</option>
                                    <option value="3">4</option>
                                </select>
                            </td>
                            <td>
                                <form action="{{ route('cart.delete', $item->rowId) }}"
                                    method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-sm btn-secondary" type="submit">Remove</button>
                                </form>
                            </td>
                            <td>$ {{ $item->model->price }}</td>
                         </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Shopping Cart</h5>
                </div>
                <div class="card-body">
                    Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel
                    like figuring out :).
                    @if(Cart::count() > 0)
                        <p class="font-weight-bold mt-2 bg-info border text-center text-white p-1 rounded">
                            {{ Cart::count() }} Item(s) in Cart.</p>
                    @else
                        <p class="font-weight-bold mt-2 bg-info border text-center text-white p-1 rounded">
                            No Item in Cart.
                        </p>
                    @endif
                </div>
                <card-footer class="mb-2 text-center">
                    @if (Cart::count() > 0)
                    <a href="{{ route('checkout') }}" class="btn btn-primary">Procced to check out</a> 
                    @else 
                     @endif
                    <a href="{{ route('shop') }}" class="btn btn-success">contuine shopping</a>
                </card-footer>
            </div>
        </div>
    </div>
    {{-- endtable --}}
    {{-- alsolik --}}
    <div class="row my-5">
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
{{-- endalsolike --}}
</div>
</div>
@include('layout.footer')
@endsection

