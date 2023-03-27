<!DOCTYPE html>
<?php
session_start();

//Esse codigo nos permite trocar de pagina a partir de um parametro
$pag=0;
if(isset($_GET['p']))
$pag=$_GET['p'];

//Isso vai testar se a sessão foi criada, caso não esteja ele enviara o usuario para a pagina de login
if (!isset($_SESSION['worker'])) {
?>
  <meta http-equiv="refresh" content="0;url=pag/login/login.php">
<?php
}else {
  require 'bd/bdconnect.php';
  ?>

  <html lang="pt">
  <head><meta charset="euc-jp">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="image/png" href="assets/img/icons/remove.png"/>
    <title>Neutron</title>


    <!-- CSS LOCAL -->
    <link href="css/styles.css" rel="stylesheet" />

    <!-- ICONS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <!-- DATATABLES PLUGIN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

    <!-- CHARTS JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    <!-- JS Local -->
    <script src="js/scripts.js"></script>

  </head>
  <body class="sb-nav-fixed">
    <?php
    include 'include/head.php';
    include 'include/menu.php';
    ?>

    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">

          <?php
          switch ($pag) {
            case '1':
            require 'pag/create/insert.php'; break;
            case '2':
            require 'pag/create/insertC.php'; break;
            case '3':
            require 'pag/read/table_equipament.php'; break;
            case '4':
            require 'pag/read/table_equipamentC.php'; break;
            case '5':
            require 'pag/create/insertW.php'; break;
            case '6':
            require 'pag/read/table_workers.php'; break;
            case '7':
            require 'pag/update/update_worker.php'; break;
            case '8':
            require 'pag/delete/delete_worker.php'; break;
            case '9':
            require 'pag/read/table_reference.php'; break;
            case '10':
            require 'pag/update/update_reference.php'; break;
            case '11':
            require 'pag/read/table_clients.php'; break;
            case '12':
            require 'pag/read/table_referencied.php'; break;
            case '13':
            require 'pag/update/update_referencied.php'; break;
            case '14':
            require 'pag/read/table_diagnose.php'; break;
            case '15':
            require 'pag/update/update_diagnose.php'; break;
            case '16':
            require 'pag/read/table_repair.php'; break;
            case '17':
            require 'pag/update/update_repair.php'; break;
            case '18':
            require 'pag/read/table_withdraw.php'; break;
            case '19':
            require 'pag/update/update_withdraw.php'; break;
            case '20':
            require 'pag/read/form_equip.php'; break;
            case '21':
            require 'pag/read/table_autoref.php'; break;
            case '22':
            require 'pag/update/update_aReference.php'; break;
            case '23':
            require 'pag/update/update_account.php'; break;
            case '24':
            require 'pag/delete/resete_password.php'; break;
            default:
            if (str_contains($_SESSION['worker']['role'],'r')) {
              require 'pag/read/table_equipament.php'; break;
            }else {
              if (str_contains($_SESSION['worker']['role'],'t')) {
                require 'pag/read/table_diagnose.php'; break;
              }else {
                require 'pag/read/table_workers.php'; break;
              }
            }

          }
          ?>
        </div>
      </main>
    </div>
  </div>
</body>
</html>

<?php
}
?>
