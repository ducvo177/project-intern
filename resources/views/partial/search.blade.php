<form class="table-search float-end d-flex" action="">
    <input type="text" name="key" class="form-control" placeholder="Search" value={{ request()->key }}>
    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
    <select name="role" id="role" class="form-select">
        <option></option>
        <option value="1" {{ request()->role == 1 ? 'selected' : '' }}>Admin</option>
        <option value="3" {{ request()->role == 3 ? 'selected' : '' }}>Student</option>
    </select>
</form>
