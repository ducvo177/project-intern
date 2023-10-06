@extends(Auth()->user()->type === 1 ? 'layouts.admin' : 'layouts.user')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Form sửa khóa học</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo (Auth()->user()->type === 1) ? route('dashboard') : route('home'); ?>">
                                Quản lý khóa học
                            </a></li>
                            <li class="breadcrumb-item active">Form sửa khóa học</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ">Sửa khóa học</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('course.update', $course->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @include('admin.courses._form')
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
