@extends('layouts.app')

@section('content')

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <form class="row g-0" action={{ route('update-cart') }} method="POST">
                            @csrf
                            <div class="col-lg-8">
                                <div class="p-5">
                                    @if (session()->has('notification'))
                                        <div class="alert alert-success alert-dismissible">
                                            {{ session()->get('notification') }}</div>
                                    @endif
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Courses Cart</h1>
                                        <div class="pt-5">
                                            <a href="{{ route('delete-all') }}" class="text-body"> <button type="button"
                                                    class="btn btn-danger">Delete All</button></a>
                                        </div>
                                    </div>

                                    <hr class="my-4">
                                    @if (!empty(session()->get('cart')))
                                        @foreach (session()->get('cart') as $cartItem)
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="{{ URL::asset('storage/attachments/' . $cartItem['image']) }}"
                                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h5 class="text-black mb-0">{{ $cartItem['name'] }}</h5>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <button class="btn btn-link px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <input min="0" name="quantity[]"
                                                        value="{{ $cartItem['quantity'] }}" type="number"
                                                        class="form-control form-control-sm" />
                                                    <button class="btn btn-link px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0">{{ $cartItem['price'] }}</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="{{ route('delete-from-cart', ['id' => $cartItem['id']]) }}"
                                                        class="text-muted"><i class="fas fa-times"></i></a>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                        @endforeach
                                    @else
                                        <h2>Your cart is empty</h2>
                                    @endif

                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="{{ route('home') }}" class="text-body">
                                                <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">Items:</h5>
                                        @if (!empty(session()->get('cart')))
                                            <h5> {{ $total }} </h5>
                                        @endif
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total price</h5>
                                        <h5>€ 137.00</h5>
                                    </div>

                                    <button type="submit" class="btn btn-dark btn-block btn-lg"
                                        data-mdb-ripple-color="dark">Purchase</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    console.log(document.getElementById('quantity'));
</script>
