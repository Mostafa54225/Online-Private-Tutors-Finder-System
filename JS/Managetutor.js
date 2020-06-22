function myFunction() {
  var x = document.getElementById("managee");
  var y = document.getElementById("show");


  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}

function Del(delid) {
    if (confirm("do you want to delete")) {
        window.location.href='deleteTutor.php?delid=' +delid+'';
        return true;
    }
}

function Accept(acceptid) {
    if (confirm('do you want to accept')) {
        window.location.href='acceptTutor.php?acceptid=' +acceptid+'';
        return true;
    }
}