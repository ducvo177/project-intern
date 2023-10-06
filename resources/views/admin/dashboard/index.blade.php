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
            <div class="row">
                <div class="col-xl-3 col-sm-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-primary">
                                    <i class="fe fe-users"></i>
                                </span>
                                <div class="dash-count">
                                    <a href="#" class="count-title">Thành viên</a>
                                    <a href="#" class="count"> {{$statistic['user_count']}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-warning">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                </span>
                                <div class="dash-count">
                                    <a href="#" class="count-title">Danh mục</a>
                                    <a href="#" class="count"> {{$statistic['category_count']}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-danger">
                                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                                </span>
                                <div class="dash-count">
                                    <a href="#" class="count-title">Khóa học</a>
                                    <a href="#" class="count">{{$statistic['course_count']}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-info">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </span>
                                <div class="dash-count">
                                    <a href="#" class="count-title">Đơn đặt hàng</a>
                                    <a href="#" class="count"> {{$statistic['course_user_count']}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex">

                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start">Đơn đặt hàng mới nhất</h4>
                            <div class="table-search float-end">
                                <input type="text" class="form-control" placeholder="Search">
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive no-radius">
                                <table class="table table-hover table-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Mã đơn hàng</th>
                                            <th>Ngày đặt hàng</th>
                                            <th class="text-center">Tên khách hàng</th>
                                            <th>Tên khóa học</th>
                                            <th class="text-center">Số lượng sản phẩm</th>
                                            <th class="text-center">Trạng thái</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="text-center">
                                                <div class="font-weight-600 ">{{$order->id}}</div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="font-weight-600">{{$order->created_at->format('d/m/Y')}}</div>
                                            </td>
                                            <td class="text-center">{{$order->user_name}}</td>
                                            <td class="text-nowrap ">{{$order->course_name}}</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">{{ $order->paid?'Đã thanh toán':'Chưa thanh toán'}}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                <x-button-delete
                                                            route="{{ route('cart.destroy', ['cart' => $order->id]) }}"
                                                            deleteId="{{ $order->id }}"
                                                            isUser="false" />
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
