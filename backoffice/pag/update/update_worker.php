<?php
if(isset($_GET['id']))
$id = $_GET['id'];

$sql = "SELECT * FROM workers where id_wkr = $id";
$resultado = mysqli_query($conn,$sql);
if(!$resultado){
  echo "Erro ao aceder à tabela: " .mysqli_error($conn);
}

$row = mysqli_fetch_array($resultado);

?>
<script src="js/worker.js" crossorigin="anonymous"></script>

<center>

  <div id="alerts" style="width: 50%;z-index: 2; position: absolute; top:2%; left: 450px">

  </div>
</center>

<h1 class="mt-4">Editar Funcionario</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.php">Geral</a></li>
  <li class="breadcrumb-item active">Editar Funcionario</li>

</ol>


<div class="container-fluid bg-dark rounded" style="margin-bottom: 20px;">

  <form id="regform">
    <br>

<div class="row">

    <!--Nome e Sobrenome-->

      <div class="col-md-3 mb-3">
        <div class="input-group mb-3">
          <span class="input-group-text" id="#">Id</span>
          <input type="text" class="form-control" name="id" value="<?php echo $row['id_wkr'] ?>" id="id" aria-describedby="basic-addon1" readonly>
        </div>
      </div>


      <!--Data-->
      <div class="col-md-4 mb-3">
        <div class="input-group editavel">
          <span class="input-group-text">Nome</span>
          <input type="text" name="data" aria-label="rev" id="name" value="<?php echo $row['name_wkr'] ?>" class="form-control" >
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="input-group mb-3 editavel">
          <span class="input-group-text" id="#">Email</span>
          <input type="text" class="form-control" name="email" value="<?php echo $row['email_wkr'] ?>" id="email" aria-describedby="basic-addon1">
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="input-group mb-3 editavel">
          <span class="input-group-text">Telemovel</span>
          <input type="text" class="form-control" name="telemovel" id="phone" value="<?php echo $row['phone_wkr'] ?>" aria-describedby="basic-addon1">
        </div>
      </div>

      <div class="form-row">
        <?php
        $sql2 = "SELECT * FROM roles";
        $result = mysqli_query($conn,$sql2);
        if(!$result)
            echo "Erro ao aceder à tabela: " .mysql_error();
        else if (mysqli_num_rows($result)>0){
                $cont=0;
              while ($row2 = mysqli_fetch_array($result)){
          ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" id="role" type="checkbox" name="tipo" value="<?php echo $row2['char_role'] ?>" <?php if (str_contains($row['role_wkr'],$row2['char_role'])) echo 'checked'?>>
            <label class="form-check-label" for="tipo" style="color:white;"><?php echo $row2['name_role'] ?></label>
        </div>
        <?php
              }
            }
         ?>
     </div>

</div>

  <br>
  <center>
    <button type="button" id="updatebuttonValue" class="btn btn-outline-success">Editar</button>
  </center>
  <br/ >

</form>
</div>
