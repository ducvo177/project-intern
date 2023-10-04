@extends('layouts.user')

@section('content')
    <div class="container">

        @if (session()->has('notification'))
            <div class="alert alert-success alert-dismissible">{{ session()->get('notification') }}</div>
        @endif
        <a href={{ route('cart') }} class="btn btn-success">Your Cart <i class="fa-solid fa-cart-shopping"></i></a>
        <div class="row justify-content-center mt-4">
            <div class="d-flex ">
                @foreach ($courses as $course)
                    <div class="card mx-3" style="width: 18rem;">
                        <img class="card-img-top"
                            src="{{ URL::asset('storage/attachments/' . $course->attachment->file_name) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-truncate">{{ $course->name }}</h5>
                            <p class="card-text card-text_price mb-0"><strong>Giá khuyến mãi:</strong> <span class="text-danger"> {{ $course->price }} $</span></p>
                            <p class="card-text card-text_price mb-0"><strong>Giá cũ:</strong><del class="text-secondary"> {{ $course->old_price }} $</del>
                            </p>
                            <p class="card-text mb-0"><strong>Lượt xem:</strong> {{ $course->view_count ?? '0' }} <i
                                    class="fa-solid fa-eye"></i>
                            </p>
                            <p class="card-text card-description"><strong>Mô tả:</strong> {{ $course->description }}
                            </p>

                            <a href={{ route('add-to-cart', ['id' => $course->id]) }} class="btn btn-primary">Add to cart <i
                                    class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5">
                {{ $courses->appends(request()->all())->links() }}</div>
        </div>
    </div>
@endsection
