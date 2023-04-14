@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        <h3 class="text-center">
                            {{ __('Before proceeding, please check your email for a verification link.') }}</h3>
                        <br />
                        <img class="img-responsive w-25 mx-auto d-block" src="{{ asset('/assets/img/email.webp') }}">
                        <h3 class="text-center">{{ __('If you did not receive the email') }}</h3>
                        <br />
                        <form class="w-100" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-primary float-right mx-auto d-block">{{ 'Resend email' }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
