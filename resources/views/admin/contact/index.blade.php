@extends(Auth()->user()->type === 1 ? 'layouts.admin' : 'layouts.user')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex">

                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start">Phản hồi của khách hàng</h4>
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
                                            <th class="text-center">Mã phản hồi</th>
                                            <th>Ngày phản hồi</th>
                                            <th class="text-center">Tên khách hàng</th>
                                            <th>Mail khách hàng</th>
                                            <th>Số lượng</th>
                                            <th class="text-center">Số điện thoại khách hàng</th>
                                            <th class="text-center">Nội dung</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td class="text-center">
                                                <div class="font-weight-600 ">{{$contact->id}}</div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="font-weight-600">{{$contact->created_at->format('d/m/Y')}}</div>
                                            </td>
                                            <td class="text-center">{{$contact->name}}</td>
                                            <td class="text-nowrap ">{{$contact->email}}</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">{{ $contact->phone}}</td>
                                            <td class="text-center">{{ $contact->content}}</td>
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
