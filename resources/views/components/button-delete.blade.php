<form action={{ $route }} method="POST" onclick="return checkDelete({{$deleteId}}, {{$isUser??Auth::user()->id}})"
    id="delete-item">
    @method('delete')
    @csrf
    <button class="btn btn-sm bg-danger-light delete-btn" type="submit">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>
