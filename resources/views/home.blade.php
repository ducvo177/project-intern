@extends('layouts.user')

@section('content')
    <div class="container user">

        @if (session()->has('notification'))
            <div class="alert alert-success alert-dismissible">{{ session()->get('notification') }}</div>
        @endif
        <div class="container-slider-div">
        <div class="container-slider-overlay">
            <h1 class="slider_title">120 Days <br/>
            Change your career
        </h1>
        <span class="slider_description">
Đào tạo thế hệ lập trình viên kiến tạo thế giới số 1 </br>
bắt đầu từ con số 0
        </span>

        </div>
        <div class="container-slider">
            <img src="{{ asset('/assets/img/slider-1.jpg')}}" class='container-slider-item'>
            <img src="{{ asset('/assets/img/slider-2')}}" class='container-slider-item'>
            <img src="{{ asset('/assets/img/slider-3.webp')}}" class='container-slider-item'>
        </div>
        </div>


        <div class="row justify-content-center mt-4">
            <h2 class="course_title">Các khóa học của chúng tôi</h2>
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
                <a href={{ route('cart') }} class="btn btn-outline-success btn-cart">Giỏ hàng của bạn <i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </div>
@endsection
