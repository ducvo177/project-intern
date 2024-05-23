@extends('layouts.user')

@section('content')

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <form class="row g-0" method="POST">
                            @csrf
                            <div class="col-lg-8">
                                <div class="p-5">
                                    @if (session()->has('notification'))
                                        <div class="alert alert-success alert-dismissible">
                                            {{ session()->get('notification') }}</div>
                                    @endif
                                    <input type="hidden" name="total" value="{{ $totalPrice }}">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Giỏ hàng</h1>

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
                                                    <span class="btn px-2"
                                                    >{{ $cartItem['quantity'] }}
                                                    </span>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0">{{ $cartItem['quantity'] * $cartItem['price'] }} $</h6>
                                                </div>
                                                <a href="{{ route('delete-from-cart', ['id' => $cartItem['id']]) }}"  class="text-light col-md-1 col-lg-1 col-xl-1">
                                                <div class=" btn btn-danger ">
                                                <i class="fas fa-times">
                                                      </i>
                                                </div>
                                                </a>
                                            </div>
                                            <hr class="my-4">
                                        @endforeach
                                    @else
                                        <h2>Giỏ hàng của bạn đang trống</h2>
                                    @endif
                                    <div class="pt-5 float-end">
                                            <a href="{{ route('delete-all') }}" class="text-body"> <button type="button"
                                                    class="btn btn-danger">Xóa tất cả</button></a>
                                    </div>
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="{{ route('home') }}" class="text-body">
                                                <i class="fas fa-long-arrow-alt-left me-2"></i>Quay lại trang chủ</a></h6>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Hóa đơn</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">Số khóa học:</h5>
                                        @if (!empty(session()->get('cart')))
                                            <h5> {{ $total }} </h5>
                                        @endif
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Tổng tiền:</h5>
                                        <input name='total' type="hidden" value="{{ $totalPrice }}" />
                                        <h5>{{ $totalPrice }} $</h5>
                                    </div>
                                    <input type="submit" name="checkout_button" formaction="{{ route('checkout-cart') }}"
                                        class="btn btn-primary btn-block btn-lg" data-mdb-ripple-color="black"
                                        value='Thanh toán'>
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
