@extends('layouts.admin')
@section('content')
    @parent
    <body>
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center row">
                <div class=" col-12">
                    <img src="https://cdn.pixabay.com/photo/2017/03/09/12/31/error-2129569__340.jpg" alt=""
                        class="img-fluid">
                </div>
                <div class=" col-12 mt-5">
                    <p class="fs-3"> <span class="text-danger">Opps!</span> Your column not found.</p>
                    <p class="lead">
                        The page you’re looking for doesn’t exist.
                    </p>
                    <a href="{{ route('user.index') }}" class="btn btn-primary">Go Home</a>
                </div>

            </div>
        </div>
    </body>

</html>
@endsection
