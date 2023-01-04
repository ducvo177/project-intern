@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Change Password</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Account Management</a></li>
                            <li class="breadcrumb-item active">Change Password Form</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ">Add new user</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update_password') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Curent Password</label>
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                                        name="old_password" placeholder="Enter your old password">
                                    @error('old_password')
                                        <div class="alert alert-danger invalid-feedback">{{ $errors->first('old_password') }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                        name="new_password" placeholder="Enter your new password">
                                    @error('new_password')
                                        <div class="alert alert-danger invalid-feedback">{{ $errors->first('new_password') }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" placeholder="Enter your password">
                                    @error('password_confirmation')
                                        <div class="alert alert-danger invalid-feedback">
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                    @enderror
                                </div>
                        </div>
                        <div class="text-center mb-5">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        @endsection
