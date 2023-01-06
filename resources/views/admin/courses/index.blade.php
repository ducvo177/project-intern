@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @if (session()->has('notification'))
                <div class="alert alert-success alert-dismissible">{{ session()->get('notification') }}</div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible">{{ session()->get('error') }}</div>
            @endif
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
                            <h4 class="card-title float-start mr-auto">Danh sách Courses</h4>
                            <x-search-form>
                                <x-slot:slot>
                                    <select name="category" id="category" class="form-select">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option value={{ $category->id }}
                                                {{ request()->key === $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </x-slot:slot>
                            </x-search-form>
                            <a href="{{ route('course.create') }}"><button class="btn btn-primary">Create new courses <i
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
                                            <th>Category</th>
                                            <th>Online</th>
                                            <th> Students</th>
                                            <th>Lessons</th>
                                            <th>Sections</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>
                                                    <div class="font-weight-600">{{ $course->id }}</div>
                                                </td>
                                                <td>
                                                    {{ $course->name }}
                                                </td>
                                                <td>
                                                    {{ $course->category->name ?? null }}
                                                </td>
                                                <td>
                                                    {{ $course->online }}
                                                </td>
                                                <td>
                                                    {{ $course->users_count }}
                                                </td>
                                                <td>
                                                    {{ $course->lessons_count }}
                                                </td>
                                                <td>
                                                    {{ $course->sections_count }}
                                                </td>
                                                <td>
                                                    {{ $course->created_at }}
                                                </td>
                                                <td>
                                                    {{ $course->updated_at }}
                                                </td>
                                                <td>
                                                    <div class="actions d-flex">
                                                        <a href="#">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <button class="btn btn-sm bg-danger-light" type="submit">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="mt-5">
                                    {{ $courses->appends(request()->all())->links() }}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

