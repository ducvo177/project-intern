function checkDelete(id, currentUserId) {
    if (!confirm("Bạn có chắc muốn xóa bản ghi này không??")) {
           return false;
    }

    if (id == currentUserId && currentUserId) {
          alert('Bạn không thể xóa tài khoản này');
          return false;
    }

    return true;
}

