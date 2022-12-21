@extends('layouts.admin')
@section('content')
    @parent
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Tài khoản quản trị</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Danh sách</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex ">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start mr-auto">Danh sách User</h4>
                            <form class="table-search float-end" action="">
                                <input type="text" name="key" class="form-control" placeholder="Search"
                                    value={{ request()->key }}>
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
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
                                                <x-sort-link columnName="id" sortType="desc" />
                                            </th>
                                            <th>Name
                                                <x-sort-link columnName="name" sortType="desc" />
                                            </th>
                                            <th>Phone</th>
                                            <th> Email
                                                <x-sort-link columnName="email" sortType="desc" />
                                            </th>
                                            <th>Email Verified At</th>
                                            <th class="text-center">Type</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $row)
                                            <tr>
                                                <td>
                                                    <div class="font-weight-600">{{ $row->id }}</div>
                                                </td>
                                                <td>{{ $row->name }}</td>
                                                <td>
                                                    {{ $row->phone }}
                                                </td>
                                                <td>
                                                    {{ $row->email }}
                                                </td>
                                                <td>
                                                    @if ($row->email_verified_at)
                                                        {{ $row->email_verified_at }}
                                                    @else
                                                        Not verified
                                                    @endif

                                                </td>


                                                <td class="text-center">
                                                    @if ($row->type == '1')
                                                        Admin
                                                    @else
                                                        Student
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $row->created_at }}
                                                </td>
                                                <td>
                                                    {{ $row->updated_at }}
                                                </td>
                                                <td>
                                                    <div class="actions">
                                                        <a href="{{ route('user.edit', ['user' => $row->id]) }}"
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
                                    {{ $users->appends(['key' =>request()->key])->links('pagination.default') }}</div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
