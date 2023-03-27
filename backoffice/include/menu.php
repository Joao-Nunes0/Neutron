
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Interface</div>
                          <?php if (str_contains($_SESSION['worker']['role'],'r')){ ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Recepção
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="?p=1">Inserir Produto</a>
                                    <a class="nav-link" href="?p=2">Inserir Clientes</a>
                                    <a class="nav-link" href="?p=3">Equipamentos Pendentes</a>
                                    <a class="nav-link" href="?p=18">Equipamentos para Retirada</a>
                                    <a class="nav-link" href="?p=4">Equipamentos Concluido</a>
                                    <a class="nav-link" href="?p=11">Clientes Registrados</a>
                                </nav>
                            </div>

                          <?php } ?>
                          <?php if (str_contains($_SESSION['worker']['role'],'t')){ ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Engenheiro
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="?p=21">Reivindicar Equipamento</a>
                                    <a class="nav-link" href="?p=14">Diagnostico</a>
                                    <a class="nav-link" href="?p=16">Reparação</a>
                                </nav>
                            </div>

                          <?php } ?>
                          <?php if (str_contains($_SESSION['worker']['role'],'a')){ ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Adiministrador
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="?p=6">Gerir Funcionario</a>
                                    <a class="nav-link" href="?p=9">Atribuir tarefas</a>
                                    <a class="nav-link" href="?p=12">Tarefas atribuidas</a>
                                </nav>
                            </div>

                          <?php } ?>

          </div>
        </div>
        <div class="sb-sidenav-footer bg-success" style="color: white;">
            <div class="small">Logado com:</div>
            <?php echo $_SESSION['worker']['name']?>
        </div>

      </nav>
    </div>
