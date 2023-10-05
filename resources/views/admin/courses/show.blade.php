@extends(Auth()->user()->type === 1 ? 'layouts.admin' : 'layouts.user')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Chi tiết khóa học</h3>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mx-1" style="width: 20rem;">
                        <img class="card-img-top h-50 "
                            src="{{ URL::asset('storage/attachments/' . $course->attachment->file_name) }}"
                            alt="Card image cap">
                    </div>
                    <div>
                        <h5 class=" text-uppercase text-truncate">{{ $course->name }}</h5>
                        <p>Price: {{ $course->price }} $</p>
                        <p>Old Price:<del class="text-danger"> {{ $course->old_price }}</del> $
                        </p>
                        <p>Views: {{ $course->view_count ?? '0' }} <i class="fa-solid fa-eye"></i>
                        </p>
                        <p>Description: {{ $course->description }}</p>
                        <p>Content: {{ $course->content }}
                        </p>
                    </div>

                </div>
            @endsection
