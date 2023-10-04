@extends('layouts.user')

@section('content')
<div class="container user">

    @if (session()->has('notification'))
    <div class="alert alert-success alert-dismissible">{{ session()->get('notification') }}</div>
    @endif
    <div class="container-slider-div">
        <div class="container-slider-overlay">
            <h1 class="slider_title">120 Days <br />
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
                <img class="card-img-top" src="{{ URL::asset('storage/attachments/' . $course->attachment->file_name) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-uppercase text-truncate">{{ $course->name }}</h5>
                    <p class="card-text card-text_price mb-0"><strong>Giá khuyến mãi:</strong> <span class="text-danger"> {{ $course->price }} $</span></p>
                    <p class="card-text card-text_price mb-0"><strong>Giá cũ:</strong><del class="text-secondary"> {{ $course->old_price }} $</del>
                    </p>
                    <p class="card-text mb-0"><strong>Lượt xem:</strong> {{ $course->view_count ?? '0' }} <i class="fa-solid fa-eye"></i>
                    </p>
                    <p class="card-text card-description"><strong>Mô tả:</strong> {{ $course->description }}
                    </p>

                    <a href={{ route('add-to-cart', ['id' => $course->id]) }} class="btn btn-primary">Add to cart <i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-5">
            {{ $courses->appends(request()->all())->links() }}
        </div>
        <a href={{ route('cart') }} class="btn btn-outline-success btn-cart">Giỏ hàng của bạn <i class="fa-solid fa-cart-shopping"></i></a>

        <div class="introduce">
            <div class="introduce_item">
                <img src="{{ asset('/assets/img/introduce1.png')}}" alt="" class="introduce_img">
                <div class="introduce_content">
                    <h2 class="introduce_title">CODING BOOTCAMPS
                    </h2>
                    <p class="introduce_description">
                        Mô hình đào tạo lập trình viên thông qua môi trường học tập dưới dạng “trại huấn luyện”
                    <ul class="introduce_description_list">
                        <li class="introduce_description_item">Đào tạo thực chiến, sát với nhu cầu thực tế, theo đặt hàng Doanh nghiệp</li>
                        <li class="introduce_description_item">Đội ngũ giảng viên chuyên gia có kinh nghiệm huấn luyện</li>
                        <li class="introduce_description_item">Thời gian đào tạo ngắn, cường độ cao</li>
                        <li class="introduce_description_item">Đảm bảo việc làm đầu ra 100%</li>
                    </ul>
                    </p>
                </div>
            </div>
            <div class="introduce_item">
                <img src="{{ asset('/assets/img/introduce2.png')}}" alt="" class="introduce_img">
                <div class="introduce_content">
                    <h2 class="introduce_title">LEARNING BY DOING
                    </h2>
                    <p class="introduce_description">
                    Phương pháp đào tạo thực chiến, thực hành trên các dự án doanh nghiệp giúp thay đổi nhanh nhất nhận thức và kỹ năng của học viên
                    <ul class="introduce_description_list">
                        <li class="introduce_description_item">Học viên học qua dự án và các vấn đề thực tế</li>
                        <li class="introduce_description_item">Được đánh giá như đang làm việc tại công ty bởi các bạn học như đồng nghiệp và bởi thầy như quản lý</li>
                        <li class="introduce_description_item">Dùng ngay những công cụ và công nghệ sẽ sử dụng tại công ty</li>
                        <li class="introduce_description_item">Đảm bảo việc làm đầu ra 100%</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
