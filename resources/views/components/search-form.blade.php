<form class="table-search float-end d-flex" action="">
    <input type="text" name="key" class="form-control" placeholder="Search" value={{ request()->key }}>
    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
    {{ $slot }}
</form>
