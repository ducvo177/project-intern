@extends(Auth()->user()->type === 1 ? 'layouts.admin' : 'layouts.user')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title float-start">Thống kê</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.statis-detail') }}" method="post" class="mx-4 my-5">
                            @csrf
                            <div class="row mb-3 d-flex flex-col">
                                <div class="col-md-4">
                                    <label for="type" class="card-title">Loại thống kê</label>
                                    <select name="type" class="form-control" required>
                                        <option value="revenue">Thống kê doanh thu</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="user_id" class="card-title">Chọn người dùng</label>
                                    <select name="user_id" class="form-control" required>
                                        <option value="all">Tất cả người dùng</option>
                                        @foreach($userList as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="d-flex my-3 gap-5">
                                    <div class="col-md-4">
                                        <label for="begin_date" class="card-title">Ngày bắt đầu</label>
                                        <input type="date" id="begin_date" name="begin_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="end_date" class="card-title">Ngày kết thúc</label>
                                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Thực hiện thống kê</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get today's date
        var today = new Date();
        var endDate = today.toISOString().split('T')[0];

        // Get the date one month ago
        var lastMonth = new Date();
        lastMonth.setMonth(today.getMonth() - 1);
        var beginDate = lastMonth.toISOString().split('T')[0];

        // Set the values of the date inputs
        document.getElementById('begin_date').value = beginDate;
        document.getElementById('end_date').value = endDate;
    });
</script>
@endsection
