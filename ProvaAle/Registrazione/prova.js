function logout() {
  $.ajax({
    url: "logout.php",
    type: "POST",
    success: function() {
      window.location.href="index.php";
    }
  })
}