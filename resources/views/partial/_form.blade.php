<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror "
            name="name" placeholder="Enter your name" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <div class="alert alert-danger invalid-feedback">{{ $errors->first('name') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror"
            name="phone" placeholder="+84 xxxxxxxxx" value="{{ old('phone') }}">
        @if ($errors->has('phone'))
            <div class="alert alert-danger invalid-feedback">{{ $errors->first('phone') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label>Email </label>
        <input type="email" class="form-control @error('email') is-invalid @enderror"
            name="email" placeholder="abc123@gmail.com" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <div class="alert alert-danger invalid-feedback">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" placeholder="Enter your password">
        @if ($errors->has('password'))
            <div class="alert alert-danger invalid-feedback">{{ $errors->first('password') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
            name="password_confirmation" placeholder="Enter your password">
        @if ($errors->has('password_confirmation'))
            <div class="alert alert-danger invalid-feedback">{{ $errors->first('password_confirmation') }}
            </div>
        @endif
    </div>
</div>
<div class="text-center mb-5">
<button type="submit" class="btn btn-primary">Submit</button>
</div>

</form>
