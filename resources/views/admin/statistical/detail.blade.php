@extends(Auth()->user()->type === 1 ? 'layouts.admin' : 'layouts.user')

@section('content')
    <div class="page-wrapper">
        <div class="user">
            <div class="col-md-12 d-flex ">
                <div class="card card-table flex-fill">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive no-radius">
                            <table class="table table-hover table-center table-striped">
                                <thead>
                                    <tr>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="font-weight-600">Số lượng</div>
                                        </td>
                                        <td>
                                            <div class="font-weight-600">{{ count($statis) }}</div>
                                        </td>
                                        <td>
                                            <div class="font-weight-600">Tổng giá</div>
                                        </td>
                                        <td>
                                            <div class="font-weight-600">
                                                {{ $statis }}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
