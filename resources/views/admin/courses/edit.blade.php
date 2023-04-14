@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Edit Course Form</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Course Management</a></li>
                            <li class="breadcrumb-item active">Edit Course Form</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ">Edit Couse</h4>
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
