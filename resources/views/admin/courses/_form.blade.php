@csrf
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror " name="name "
        placeholder="Enter course name" value="{{ $course->name ?? old('name') }}">
    @error('name')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
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
    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
        placeholder="x.xx" value="{{ $course->price ?? old('price') }}">
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
    <label>Create by</label>
    <input type="text" class="form-control @error('create_by') is-invalid @enderror" name="created_by"
         value="{{ $course->created_by ?? old('created_by') }}">
    @error('created_by')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('created_by') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Category Id</label>
    <input type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id"
         value="{{ $course->category_id ?? old('category_id') }}">
    @error('category_id')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('category_id') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Total lessons</label>
    <input type="text" class="form-control @error('lessons') is-invalid @enderror" name="lessons"
         value="{{ $course->lessons ?? old('lessons') }}">
    @error('lessons')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('lessons') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>View Count</label>
    <input type="text" class="form-control @error('view_count') is-invalid @enderror" name="view_count"
         value="{{ $course->view_count ?? old('view_count') }}">
    @error('view_count')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('view_count') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Benefits</label>
    <input type="text" class="form-control @error('benefits') is-invalid @enderror" name="view_count"
         value="{{ $course->view_count ?? old('view_count') }}">
    @error('view_count')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('view_count') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>FQA</label>
    <input type="text" class="form-control @error('view_count') is-invalid @enderror" name="view_count"
         value="{{ $course->view_count ?? old('view_count') }}">
    @error('view_count')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('view_count') }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="d-block">Is Feature:</label>
    <div class="form-check form-check-inline @error('is_feature') is-invalid @enderror">
    <input class="form-check-input" type="radio" name="is_feature" id="is_feature_true" value="1">
    <label class="form-check-label" for="is_feature_true">True</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="is_feature" id="is_feature_false" value="0">
    <label class="form-check-label" for="is_feature_false">False</label>
    </div>
    @error('is_feature')
    <div class="alert alert-danger invalid-feedback">{{ $errors->first('view_count') }}</div>
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
    <textarea rows="4" cols="5" class="form-control @error('content') is-invalid @enderror" name="description" placeholder="Enter description"
         value="{{ $course->description ?? old('description') }}"></textarea>
    @error('description')
        <div class="alert alert-danger invalid-feedback">{{ $errors->first('description') }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Content</label>
    <textarea rows="4" cols="5" class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Enter course content"
    value="{{ $course->content ?? old('content') }}"></textarea>
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
</div>
<div class="text-center mb-5">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
