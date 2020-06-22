function Del(delid) {
    if (confirm("do you want to delete")) {
        window.location.href='deleteparent.php?delid=' +delid+'';
        return true;
    }
}