@extends('layouts.user')

@section('content')

<div class="container user">
    <a id="button"></a>
    <iframe width="261" height="134" src="https://w2.countingdownto.com/5030973" frameborder="0" class="countdown_iframe"></iframe>
    @if (session()->has('notification'))
    <div class="alert alert-success alert-dismissible">{{ session()->get('notification') }}</div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-error alert-dismissible">{{ session()->get('error') }}</div>
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
            <a href="{{ route('course.show', ['course' => $course->id]) }}" class='course_link'>
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

                        <a href={{ route('add-to-cart', ['id' => $course->id]) }} class="btn btn-primary float-end mt-3">Đăng ký <i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-5">
            {{ $courses->appends(request()->all())->links() }}
        </div>


        <section class="introduce">
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
        </section>
        <section class="review">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-xl-8 text-center">
                    <h2 class="mb-4 pt-5 font-weight-bold">Đánh giá về các khóa học của trung tâm</h2>
                    <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                        Dưới đây là một số đánh giá qua quá trình trực tiếp trải nghiệm khóa học của các học viên. Các học viên đều được đào tạo một cách bài bản và chuyên nghiệp bất kể xuất phát điểm của họ là ở đâu.
                    </p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-4 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('/assets/img/profiles/avatar-02.jpg')}}" class="rounded-circle shadow-1-strong" width="150" height="150" />
                    </div>
                    <h5 class="mb-3">Đào Phương Hồng</h5>
                    <h6 class="text-primary mb-3">Web Developer</h6>
                    <p class="px-xl-3">
                        <i class="fas fa-quote-left pe-2"></i>
                        Trung tâm đào tạo code này thực sự ấn tượng! Họ cung cấp các khóa học chất lượng về lập trình với đội ngũ giảng viên chuyên nghiệp. Học viên được hỗ trợ tận tâm và có cơ hội thực hành dự án thực tế. Tôi đã học nhiều và phát triển sự tự tin trong lập trình ở đây.
                    </p>
                    <ul class="list-unstyled d-flex justify-content-center mb-0">
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('/assets/img/profiles/avatar-03.jpg')}}" class="rounded-circle shadow-1-strong" width="150" height="150" />
                    </div>
                    <h5 class="mb-3">Nguyễn Thị Lan</h5>
                    <h6 class="text-primary mb-3">UI/UX designer</h6>
                    <p class="px-xl-3">
                        <i class="fas fa-quote-left pe-2"></i>Một nơi tuyệt vời để bắt đầu hành trình lập trình! Trung tâm đào tạo code này cung cấp môi trường học tập thân thiện, các tài liệu học tập chất lượng và sự hỗ trợ từ đội ngũ giảng viên dày dặn kinh nghiệm.
                    </p>
                    <ul class="list-unstyled d-flex justify-content-center mb-0">
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('/assets/img/profiles/avatar-04.jpg')}}" class="rounded-circle shadow-1-strong" width="150" height="150" />
                    </div>
                    <h5 class="mb-3">Vũ Đình Sơn</h5>
                    <h6 class="text-primary mb-3">Android Developer</h6>
                    <p class="px-xl-3">
                        <i class="fas fa-quote-left pe-2"></i>Tôi đã tham gia nhiều khóa học ở đây và thực sự thấy hài lòng. Trung tâm đào tạo code này có chương trình học đa dạng, giúp tôi phát triển kỹ năng lập trình một cách hiệu quả. Không chỉ vậy, môi trường học tập và sự quan tâm từ đội ngũ giảng viên khiến tôi luôn muốn tiến xa hơn trong lập trình
                    </p>
                    <ul class="list-unstyled d-flex justify-content-center mb-0">
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="far fa-star fa-sm text-warning"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class='code_class'>
        <div class="container mt-5">
            <img src="{{ asset('/assets/img/class.jpg')}}" class="class_img"/>
        </div>
        </section>
        <section class="contact">
            <div class="container mt-5 col-md-6">
                <h2>Liên hệ với chúng tôi</h2>
                <form action="{{route('contact')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="content">Câu hỏi hoặc phản hồi:</label>
                        <textarea class="form-control" id="question" name="content" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>

        </section>
        <footer class="text-center text-lg-start text-muted mt-5 p-0" style="background-color: rgba(104, 10, 131,0.05);">


            <section class="border-top">
                <div class="container text-center text-md-start mt-5">

                    <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <h7 class="text-uppercase fw-bold mb-4">
                                <a href="<?php echo (Auth()->user()->type === 1) ? route('dashboard') : route('home'); ?>" class="logo">
                                    <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo" class="logo_img mr-2">
                                </a>
                            </h7>
                            <p class="text-left mt-2">
                                "Nơi đào tạo ra những <br>lập trình viên hàng đầu"
                            </p>
                        </div>

                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">
                                Ngôn ngữ
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Angular</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">React</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Vue</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">PHP Laravel</a>
                            </p>
                        </div>

                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">
                                Hữu ích
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Tất cả khóa học</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Cài đặt tài khoản</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Đơn hàng đã đặt</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Hỗ trợ khách hàng</a>
                            </p>
                        </div>

                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Liên lạc</h6>
                            <p><i class="fas fa-home me-3 text-secondary"></i> Cầu Giấy, Hà Nội</p>
                            <p>
                                <i class="fas fa-envelope me-3 text-secondary"></i>
                                info@example.com
                            </p>
                            <p><i class="fas fa-phone me-3 text-secondary"></i> 08888888888</p>
                            <p><i class="fas fa-print me-3 text-secondary"></i> + 09999999999</p>
                        </div>
                    </div>

                </div>
            </section>

            <div class="text-center pt-4 pb-4" style="background-color: #6d1269; color:#fff">
                © 2023 Copyright:
                <a class="text-reset fw-bold" style="text-decoration: none;" href="https://www.facebook.com/ducklady177/">Duclangtu with love <span style=" color: red;">❤</span></a>
            </div>

        </footer>
    </div>
</div>
@endsection
