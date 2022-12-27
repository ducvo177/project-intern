<form action={{ $route }} method="POST" onclick="return deleteUser({{$userId}}, {{$currentUserId}})" id="delete-item">
    @method('delete')
    @csrf
    <button class="btn btn-sm bg-danger-light" type="submit">
        <i class="fe fe-close"></i>
    </button>
</form>
