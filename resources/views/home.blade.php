@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex ">
                @foreach ($courses as $course)
                    <div class="card mx-1" style="width: 18rem;">
                        <img class="card-img-top h-50 "
                            src="{{ URL::asset('storage/attachments/' . $course->attachment->file_name) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-truncate">{{ $course->name }}</h5>
                            <p class="card-text mb-0">Price: {{ $course->price }} $</p>
                            <p class="card-text mb-0">Old Price:<del class="text-danger"> {{ $course->old_price }}</del> $
                            </p>
                            <p class="card-text mb-0">Views: {{ $course->view_count ?? '0' }} <i class="fa-solid fa-eye"></i>
                            </p>
                            <p class="card-text mb-0 text-truncate">Description: {{ $course->description }}
                            </p>
                            <a href="#" class="btn btn-danger">Add to cart <i
                                    class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5">
                {{ $courses->appends(request()->all())->links() }}</div>
        </div>
    </div>
@endsection
