@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Update User Form</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">User Management</a></li>
                            <li class="breadcrumb-item active">Update User Form</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ">Update user</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.update', $user->id)}}" method="POST">
                                @method('PUT')
                                @include('partial._form')
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
