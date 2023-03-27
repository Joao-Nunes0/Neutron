<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
  <!-- Navbar Brand-->
  <img src="assets/img/icons/remove.png" class="d-inline-block align-top" alt="" style="height:50px;width:50px;">
  <a class="navbar-brand ps-3" href="index.php">Neutron</a>
  <!-- Sidebar Toggle-->
  <button class="btn-success btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
  <!-- Navbar Search  -->
  <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-4 my-2 my-md-0">
    <div class="input-group">
      <input class="form-control" type="text" placeholder="Pesquisar por..." hidden aria-label="Search for..." aria-describedby="btnNavbarSearch" />
      <button class="btn btn-danger" id="btnNavbarSearch" hidden type="button"><i class="fas fa-search"></i></button>
    </div>
  </form>
  <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <button type="submit" class="btn btn-success" name="button"><a href="?p=23" style="color:white;"><?php echo $_SESSION['worker']['name']; ?></a></button>
      </div>
      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" id="backlogout">
        <button type="submit" class="btn btn-success" name="button">Logout</button>
      </form>
    </ul>
</nav>
<script type="text/javascript">
$("#backlogout").submit(function(e){
  e.preventDefault();
  $.ajax({
    url: "../API/",
    method: "GET",
    data: {
      action: "authentication",
      execute: "logout"
    }
  }).done(function (value) {
    var e = $("<div>");
    e.html(value);
    console.log(e.html());

    var response = jQuery.parseJSON(e.html());

    if (response.success == false) {
      //console.log(e.html());
      $('#alerts').html('<div class="alert alert-danger alert-dismissible fade show" role="alert" style="height: 60px; text-align: center; padding:7px;"><strong>' + response.description + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 8px 10px 0 0px;"><span aria-hidden="true">&times;</span></button></div>');

    }else {
      location.reload();
    }
  });
});
</script>
