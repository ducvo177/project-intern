@csrf
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" id="name"
        onkeyup="ChangeToSlug();" placeholder="Enter course name" value="{{ $course->name ?? old('name') }}">
    @error('name')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug"
        placeholder="Enter course slug" value="{{ $course->slug ?? old('slug') }}">
    @error('slug')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('slug') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Link</label>
    <input type="text" class="form-control @error('link') is-invalid @enderror" name="link"
        placeholder="http://www.abc.com.vn" value="{{ $course->link ?? old('link') }}">
    @error('link')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('link') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Price</label>
    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="x.xx"
        value="{{ $course->price ?? old('price') }}">
    @error('price')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('price') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Old Price</label>
    <input type="text" class="form-control @error('old_price') is-invalid @enderror" name="old_price"
        placeholder="x.xx" value="{{ $course->old_price ?? old('old_price') }}">
    @error('old_price')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('old_price') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Category</label>
    <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option></option>
        @foreach ($categories as $category)
            <option value='{{ $category->id }}' {{ request()->category_id === $category->id ? 'selected' : '' }}>
                {{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('category_id') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Add New Benefit: </label>
    <input type="text" id="myInput" placeholder="Enter benefit..." class="form-control">
    <span onclick="newElement()" class="addBtn btn btn-primary">Add</span>
    <ul id="benefitList">
    </ul>
</div>
<div class="form-group">
    <label>Benefits</label>
    <input type="text" class="form-control @error('benefits') is-invalid @enderror" name="benefits" id="benefits"
        placeholder="x.xx" value="{{ $course->benefits ?? old('benefits') }}">
    @error('benefits')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('benefits') }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="d-block">Is Online:</label>
    <div class="form-check form-check-inline @error('is_online') is-invalid @enderror">
        <input class="form-check-input" type="radio" name="is_online" id="is_online_true" value="1">
        <label class="form-check-label" for="is_online_true">True</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_online" id="is_online_false" value="0">
        <label class="form-check-label" for="is_online_false">False</label>
    </div>
    @error('is_online')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('view_count') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Description</label>
    <textarea rows="4" cols="5" class="form-control @error('content') is-invalid @enderror" name="description"
        placeholder="Enter description" value="{{ $course->description ?? old('description') }}"></textarea>
    @error('description')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('description') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Content</label>
    <textarea rows="4" cols="5" class="form-control @error('content') is-invalid @enderror" name="content"
        placeholder="Enter course content" value="{{ $course->content ?? old('content') }}"></textarea>
    @error('content')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('content') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Meta Title</label>
    <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title"
        value="{{ $course->meta_title ?? old('meta_title') }}">
    @error('meta_title')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('meta_title') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Meta Desc</label>
    <input type="text" class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc"
        value="{{ $course->meta_desc ?? old('meta_desc') }}">
    @error('meta_desc')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('meta_desc') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Meta Keyword</label>
    <input type="text" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword"
        value="{{ $course->meta_keyword ?? old('meta_keyword') }}">
    @error('meta_keyword')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('meta_keyword') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Upload Image: </label>
    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
    @error('photo')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('photo') }}</div>
    @enderror
</div>
</div>
<div class="text-center mb-5">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
@push('scripts')
    <script src="{{ asset('/assets/js/benefits.js') }}"></script>
    <script src="{{ asset('/assets/js/slug.js') }}"></script>
@endpush
