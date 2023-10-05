@extends(Auth()->user()->type === 1 ? 'layouts.admin' : 'layouts.user')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Thêm tài khoản mới</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo (Auth()->user()->type === 1) ? route('dashboard') : route('home'); ?>">
    Quản lý người dùng
</a></li>
                            <li class="breadcrumb-item active">Thêm người dùng mới</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ">Thêm người dùng</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.store') }}" method="POST">
                                @include('admin.users._form')
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
