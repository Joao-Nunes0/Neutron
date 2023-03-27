<?php
if(isset($_GET['id_eqp']))
$id_eqp = $_GET['id_eqp'];

if(isset($_GET['id_client']))
$id_client = $_GET['id_client'];

$sql = "SELECT * FROM equipament,clients,relations WHERE relations.id_eqp = $id_eqp AND relations.id_client = $id_client AND relations.id_eqp = equipament.id_eqp AND relations.id_client = clients.id_client ";
$resultado = mysqli_query($conn,$sql);
if(!$resultado){
  echo "Erro ao aceder à tabela: " .mysqli_error($conn);
}
$row = mysqli_fetch_array($resultado);

?>
<script src="js/reference.js" crossorigin="anonymous"></script>

<center>
  <!--Alerta que enviou o email-->
  <div id="alerts" style="width: 50%;z-index: 2; position: absolute; top:2%; left: 450px">

  </div>
</center>

<h1 class="mt-4">Atribuir equipamentos</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.php">Geral</a></li>
  <li class="breadcrumb-item active">Atribuir equipamentos</li>

</ol>


<div class="container-fluid bg-dark rounded" style="margin-bottom: 20px;">

  <form id="regform">
    <br>

<div class="row">

  <div class="col-md-3 mb-3">
    <div class="input-group mb-3" hidden>
      <span class="input-group-text" id="#">Id</span>
      <input type="text" class="form-control" name="id" value="<?php echo $row['id_eqp'] ?>" id="id_eqp" aria-describedby="basic-addon1">
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="input-group mb-3" hidden>
      <span class="input-group-text" id="#">Id</span>
      <input type="text" class="form-control" name="id" value="<?php echo $row['id_client'] ?>" id="id_client" aria-describedby="basic-addon1">
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="input-group mb-3" hidden>
      <span class="input-group-text" id="#">Id</span>
      <input type="text" class="form-control" name="id" value="<?php echo $_SESSION['worker']['id'] ?>" id="id_wkr" aria-describedby="basic-addon1">
    </div>
  </div>

    <div class="col-md-4 mb-3">
      <div class="input-group mb-3">
        <span class="input-group-text" id="#">Marca</span>
        <input type="text" class="form-control" name="brand" value="<?php echo $row['brand_eqp'] ?>" id="brand" aria-describedby="basic-addon1" readonly>
      </div>
    </div>

      <!--Data-->
      <div class="col-md-4 mb-3">
        <div class="input-group">
          <span class="input-group-text">Modelo</span>
          <input type="text" name="data" aria-label="rev" id="model" value="<?php echo $row['model_eqp'] ?>" class="form-control" readonly>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="input-group mb-3">
          <span class="input-group-text" id="#">Nº de Serie</span>
          <input type="text" class="form-control" name="series" value="<?php echo $row['seriesnum_eqp'] ?>" id="series" aria-describedby="basic-addon1" readonly >
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="input-group mb-3">
          <span class="input-group-text">Data Recepção</span>
          <input type="text" class="form-control" name="date" id="date" value="<?php echo $row['date_reception_eqp'] ?>" aria-describedby="basic-addon1" readonly>
        </div>
      </div>

      <div class="form-group col-md-12 mb-1">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Sintomas</span>
          </div>
          <textarea class="form-control" aria-label="With textarea" id="simp" disabled><?php echo $row['simptons_eqp']?></textarea>
        </div>
      </div>

      <div class="form-group col-md-12 mb-1">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Observações</span>
          </div>
          <textarea class="form-control" aria-label="With textarea" id="obs" disabled><?php echo $row['observations_eqp']?></textarea>
        </div>
      </div>

      <div class="form-group col-md-12 mb-1">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Estado</span>
          </div>
          <textarea class="form-control" aria-label="With textarea" id="state" disabled><?php echo $row['state_eqp']?></textarea>
        </div>
      </div>

      <?php
        $consult = mysqli_query($conn,"SELECT * FROM equipament,diagnosis WHERE equipament.id_eqp = ".$row['id_eqp']." AND equipament.id_dg = diagnosis.id_dg");
        if (mysqli_num_rows($consult) > 0) {
          $row3 = mysqli_fetch_array($consult);
      ?>
      <div class="form-group col-md-12 mb-1">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Diagnostico</span>
          </div>
          <textarea class="form-control" aria-label="With textarea" id="diagnosis" disabled><?php echo $row3['diagnosis_dg'];?></textarea>
        </div>
      </div>
      <?php
      }
      ?>

</div>

  <br>
  <center>
    <button type="button" id="updatebuttonValue" class="btn btn-outline-success">Reivindicar</button>
  </center>
  <br/ >

</form>
</div>
