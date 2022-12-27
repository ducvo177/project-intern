@csrf
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror " name="name"
        placeholder="Enter your name" value="{{ $user->name ?? old('name') }}">
    @error('name')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
        placeholder="+84 xxxxxxxxx" value="{{ $user->phone ?? old('phone') }}">
    @error('phone')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('phone') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Email </label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
        placeholder="abc123@gmail.com" value="{{ $user->email ?? old('email') }}">
    @error('email')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('email') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
        placeholder="Enter your password">
    @error('password')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('password') }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Confirm Password</label>
    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
        name="password_confirmation" placeholder="Enter your password">
    @error('password_confirmation')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('password_confirmation') }}
        </div>
    @enderror
</div>
</div>
<div class="text-center mb-5">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
