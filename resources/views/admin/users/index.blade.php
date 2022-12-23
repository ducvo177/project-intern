@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="user align-items-center">
                    <div class="col">
                        <h3 class="page-title">Tài khoản quản trị</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Danh sách</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="user">
                <div class="col-md-12 d-flex ">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start mr-auto">Danh sách User</h4>
                            @include('partial.search')
                            <a href="{{ route('user.create') }}"><button class="btn btn-primary">Create new user <i
                                        class="fa-solid fa-plus"></i></button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive no-radius">
                                <table class="table table-hover table-center table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                ID
                                                <x-sort-link columnName="id" />
                                            </th>
                                            <th>Name
                                                <x-sort-link columnName="name" />
                                            </th>
                                            <th>Phone</th>
                                            <th> Email
                                                <x-sort-link columnName="email" />
                                            </th>
                                            <th class="text-center">Type</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="font-weight-600">{{ $user->id }}</div>
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    {{ $user->phone }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $user->role_name }}
                                                </td>
                                                <td>
                                                    {{ $user->created_at }}
                                                </td>
                                                <td>
                                                    {{ $user->updated_at }}
                                                </td>
                                                <td>
                                                    <div class="actions">
                                                        <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                                            class="btn btn-sm bg-success-light me-2">
                                                            <i class="fe fe-eye"></i>
                                                        </a>
                                                        <a href="" class="btn btn-sm bg-danger-light">
                                                            <i class="fe fe-close"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="mt-5">
                                    {{ $users->appends(request()->all())->links() }}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
