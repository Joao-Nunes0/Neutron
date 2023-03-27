<body>
<br>
<div id="alerts">
</div>
<div class="container bg-dark">
  <?php
  $sql = "SELECT * FROM workers WHERE id_wkr = ".$_SESSION['worker']['id'];
  $resultado = mysqli_query($conn,$sql);
  if(!$resultado){
    echo "Erro ao aceder à tabela: " .mysqli_error($conn);
  }
  $row = mysqli_fetch_array($resultado);
   ?>
  <br>
<center>
  <h2 for="basic-url" class="form-label" style="color:white;">Perfil</h2>
</center>
<div class="container-fluid bg-dark rounded" style="margin-bottom: 20px;">

  <form id="regform">
    <br>

<div class="row">
    <div class="col-md-4 mb-3">
      <div class="input-group mb-3">
        <span class="input-group-text" id="#">Nome</span>
        <input type="text" class="form-control" name="brand" value="<?php echo $row['name_wkr'] ?>" id="name" aria-describedby="basic-addon1">
      </div>
    </div>

      <!--Data-->
      <div class="col-md-4 mb-3">
        <div class="input-group">
          <span class="input-group-text">Email</span>
          <input type="text" name="data" aria-label="rev" id="email" value="<?php echo $row['email_wkr'] ?>" class="form-control">
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="input-group mb-3">
          <span class="input-group-text" id="#">Telemovel</span>
          <input type="text" class="form-control" name="series" value="<?php echo $row['phone_wkr'] ?>" id="phone" aria-describedby="basic-addon1">
        </div>
      </div>

      <div class="col-md-7 mb-3">
        <div class="input-group mb-3">
          <span class="input-group-text">Senha</span>
          <input type="text" class="form-control" name="date" id="pass" value="<?php echo $row['pass_wkr'] ?>" aria-describedby="basic-addon1">
        </div>
      </div>

      <div class="col-md-7 mb-3" hidden>
        <div class="input-group mb-3">
          <span class="input-group-text">confirm</span>
          <input type="text" class="form-control" name="simp" id="pass2" value="<?php echo $row['pass_wkr'] ?>" aria-describedby="basic-addon1" readonly>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="input-group mb-3" hidden>
          <span class="input-group-text" id="#">Id</span>
          <input type="text" class="form-control" name="id" value="<?php echo $row['id_wkr'] ?>" id="id_wkr" aria-describedby="basic-addon1">
        </div>
      </div>

</div>

  <br>
  <center>
    <button type="button" id="updatebuttonValue" class="btn btn-outline-success">Atualizar</button>
  </center>
  <br/ >

</form>
</div>

<script type="text/javascript">
$(document).ready(function(){

  $("#updatebuttonValue").click(function(e){
    e.preventDefault();
    $.ajax({
      url: "../API/",
      method: "GET",
      data: {
        action: "order",
        execute: "updateAccount",
        id: $("#id_wkr").val(),
        name: $("#name").val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
        pass: $("#pass").val(),
        pass2: $("#pass2").val()
      }
    }).done(function (Value) {
      var e = $("<div>");
      e.html(Value);
      //console.log(e.html());
      var response = jQuery.parseJSON(e.html());

      if (response.success === false) {
        //console.log(e.html());
        $('#alerts').html('<div class="alert alert-danger alert-dismissible fade show" role="alert" style="height: 40px; text-align: center; padding:7px;"><strong>' + response.description + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 8px 10px 0 0px;"><span aria-hidden="true">&times;</span></button></div>');
        window.scrollTo({ top: 0, behavior: 'smooth' });
      } else {
        $('#alerts').html('<div class="alert alert-success alert-dismissible fade show" role="alert" style="height: 40px; text-align: center; padding:7px;"><strong>' + response.description + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 8px 10px 0 0px;"><span aria-hidden="true">&times;</span></button></div>');
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
    });
  });
});


</script>
