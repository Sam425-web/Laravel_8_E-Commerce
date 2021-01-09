@extends('layout.layout')
@section('title', 'CheckOut')
@section('content')
<div class="container">
    @include('layout.navbar')
    <div class="row my-5"> 
        <div class="col-md-6">
            <div>
                 @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
                @endif
            </div>
            <h2>Check Out</h2>
            <hr>
            {{-- Form --}}
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationDefault01">Email</label>
                        <input type="email" class="form-control" id="validationDefault01" name="email"
                            value="{{ old('email') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">First name</label>
                        <input type="text" class="form-control" id="validationDefault01" name="first_name"
                            value="{{ old('first_name') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault02">Last name</label>
                        <input type="text" class="form-control" id="validationDefault02" name="last_name"
                            value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault03">City</label>
                        <input type="text" class="form-control" name="city" value="{{ old('city') }}"
                            id="validationDefault03">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault05">Zip</label>
                        <input type="number" name="zip" value="{{ old('zip') }}" class="form-control"
                            id="validationDefault05">
                    </div>
                    <h4 class="my-3 font-weight-bold">Payment Detials</h4>
                    <div class="col-md-12 mb-3">
                        <label for="validationDefault01">Name Of the Card</label>
                        <input type="text" class="form-control" id="validationDefault01" name="card_name"
                            value="{{ old('card_name') }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationDefault01">Credit or Debit Card</label>
                        <input type="number" class="form-control" id="validationDefault01" name="card_no"
                            value="{{ old('card_no') }}">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">CheckOut</button>
            </form>
            {{-- EndForm --}}
        </div>
        <div class="col-md-6">
            {{-- table --}}
            <h2 class="mb-3">Your Order</h2>
            <table class="table ">
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
                            <td><a class="text-dark"
                                    href="{{ route('product.show', $item->model->id) }}">{{ $item->model->name }}</a>
                            </td>
                            <td> <select class=" custom-select-sm">
                                    <option selected> 1</option>
                                    <option value="1">2</option>
                                    <option value="2">3</option>
                                    <option value="3">4</option>
                                </select></td>
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
            {{-- endtable --}}
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p class="ml-3">Total</p>
                </div>
                <div class="col-md-6">
                    <div class="mr-3 text-right font-weight-bolder">$ {{ Cart::total() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
@endsection