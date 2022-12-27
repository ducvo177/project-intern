<form action={{ $route }}
    method="POST" onclick="deleteUser($userId, $currentUserId)">
    @method('delete')
    @csrf
    <button class="btn btn-sm bg-danger-light" type="submit">
        <i class="fe fe-close"></i>
    </button>
</form>
