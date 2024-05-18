@extends(Auth()->user()->type === 1 ? 'layouts.admin' : 'layouts.user')

@section('content')
    <div class="page-wrapper">
        <div class="user">
            <div class="col-md-12 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title float-start">Thống kê</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive no-radius">
                            <table class="table table-hover table-center table-striped">
                                <thead>
                                    <tr>
                                        <th>Số lượng hóa đơn phát sinh</th>
                                        <th>Tổng doanh thu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="font-weight-600">{{ $statis->count() }}</div>
                                        </td>
                                        <td>
                                            <div class="font-weight-600">
                                                {{ $statis->sum('price')  }} $
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <canvas id="statisChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var statis = @json($statis);

            var labels = statis.map(function(item) {
                var date = new Date(item.created_at);
                return date.toLocaleDateString();
            });

            var data = statis.map(function(item) {
                return parseFloat(item.price);
            });

            var ctx = document.getElementById('statisChart').getContext('2d');
            var statisChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Price',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
