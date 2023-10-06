@extends(Auth()->user()->type === 1 ? 'layouts.admin' : 'layouts.user')
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
                            <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Danh sách khóa học</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="user">
                <div class="col-md-12 d-flex ">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start mr-auto">Danh sách khóa học</h4>
                            <x-search-form>
                                <x-slot:slot>
                                    <select name="category" id="category" class="form-select">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option value='{{ $category->id }}'
                                                {{ request()->key === $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </x-slot:slot>
                            </x-search-form>
                            <a href="{{ route('course.create') }}"><button class="btn btn-primary add">Tạo khóa học mới <i
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
                                            <th>Tên
                                                <x-sort-link columnName="name" />
                                            </th>
                                            <th>Thể loại</th>
                                            <th>Trạng thái</th>
                                            <th>Học sinh</th>
                                            <th>Bài học</th>
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
                                                    {{ $course->is_delete?'Không còn hoạt động':'Còn hoạt động' }}
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
                                                        <a href="{{ route('course.edit', ['course' => $course->id]) }}"
                                                            class="btn btn-sm bg-success-light me-2 edit-btn">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <x-button-delete
                                                            route="{{ route('course.destroy', ['course' => $course->id]) }}"
                                                            deleteId="{{ $course->id }}"
                                                            isUser="false" />
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
@push('scripts')
    <script src="{{ asset('/assets/js/user.js') }}"></script>
@endpush
