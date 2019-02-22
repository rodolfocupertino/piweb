<?php 

  include 'header.php';

  require 'repositorio_alunos.php';


  $alunos = $repositorio->getListaAlunos($_GET['filtro']);

if (!empty($_GET['periodo'])) {
  $alunos = $repositorio->getListaAlunosConcluintes($_GET['periodo']);
}

if (!empty($_GET['curso'])) {
  $alunos = $repositorio->getListaAlunosPorCurso($_GET['curso']);
}


  $destino = 'incluir_aluno.php';

  if (isset($_GET['codigo']) ) {
      $codigo = $_GET['codigo'];

      $aluno = $repositorio->buscarAluno($codigo);

      $destino = "alterar_aluno.php";
      $oculto = '<input type="hidden" name="codigo" value="'.$codigo.'" /> ';
  }

# Função que ajuda a desenhar o controle HTML select
function combobox($arrDados, $valorSelecionado = null) {
    echo "<option></option>";
    foreach ($arrDados as $key => $value) {
        $selected = ($valorSelecionado == $key) ? "selected=\"selected\"" : null;
        echo "<option value=\"$key\"  $selected>$value</option>";
    }
}

$array_situacao = array(
    "Em atraso" => "Em atraso",
    "Em dia" => "Em dia",
);

$array_turno = array(
    "M" => "Manhã",
    "T" => "Tarde",
    "N" => "Noite",
);


$array_curso = array(
    "Ing" => "Inglês",
    "Adm" => "Adminsitracão",
    "Inf" => "Informática",
);

$array_periodo = array(
    "1" => "1º Período",
    "2" => "2º Período",
    "3" => "3º Período",
    "4" => "4º Período",
);

?>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Cadastrar aluno
                </h1>
            </div>
            <p>
              <!-- <a href="aluno.php"><button type="button" class="btn btn-primary btn-lg">NOVO</button></a> -->
            </p>
            <hr>

                <?php if ( !empty($m) ) { ?>
                    <div class="alert alert-success" role="alert"><?=$m;?></div>
                <?php } ?>

            <div class="col-md-8">
            <p>
              <strong>Inserir:</strong><br>
                  <form name="frmAluno" method="post" action="<?=$destino;?>">
                    
                    <input type="hidden" value="<?=$a;?>" name="a">
                    <?= @$oculto;?>

                  <div class="form-group">
                    <input type="text" class="form-control" id="nome" name="nome" value="<? echo isset($aluno)?$aluno->getNome():"";?>" placeholder="Nome">
                  </div>
                
                  <div class="form-group">
                    <input type="text" class="form-control" id="matricula" name="matricula" value="<? echo isset($aluno)?$aluno->getMatricula():"";?>" placeholder="Matrícula">
                  </div>
                
                  <div class="form-group">
                    Curso: 
                    <select class="form-control" id="curso" name="curso">
                        <?php 
                          $aCurso =  isset($aluno)?$aluno->getCurso():"";
                          combobox($array_curso, $aCurso  );

                         ?>
                    </select>
                  </div>
                
                  <div class="form-group">
                    Turno:
                    <select class="form-control" id="turno" name="turno">
                        <?php 
                          $aTurno =  isset($aluno)?$aluno->getTurno():"";
                          combobox($array_turno, $aTurno  );
                         ?>
                    </select>
                  </div> 
                  
                  <div class="form-group">
                    Período: 
                    <select class="form-control" id="periodo" name="periodo">
                        <?php 
                          $aPeriodo =  isset($aluno)?$aluno->getPeriodo():"";
                          combobox($array_periodo, $aPeriodo  );

                         ?>
                    </select>
                  </div>

                  <button type="submit" class="btn btn-default">SALVAR</button>
                </form>
              
            </p>
            </div>
            <div class="col-md-3">
            
            </div>
        </div>

        <div class="row">

            
            <div class="table-responsive">
            <hr>
            <h2> alunos Cadastrados</h2>
            <div class="col-md-9">
            <p>Filtros:</p>
            <p> <a href="?">Todos</a> | <a href="?periodo=4"> Listar Concluintes</a> | Curso: <?php 
              echo "<ul>";
              foreach ($array_curso as $key => $value) {
                 // $selected = ($valorSelecionado == $key) ? "selected=\"selected\"" : null;
                  echo "<li> <a href=\"?curso=$key\">$value</a></li>";
              }
              echo "</ul>";
            ?>
            </div>
              <table class="table">
                <thead>
                    <tr>
                      <th>aluno</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>

<? 

    while($alunoTemporario = array_shift($alunos)) {
?>  
                    <tr>

                      <td><?=$alunoTemporario->getNome();?></td>
                      <td class="center">

                            <a href="alunos.php?codigo=<?=$alunoTemporario->getCodigo();?>" class="btn btn-default">Alterar</a>
                            
                            <a href="excluir_aluno.php?codigo=<?=$alunoTemporario->getCodigo();?>" class="btn btn-danger">Excluir</a>

                      </td>
                    </tr>

<?php } ?>
                  </tbody>
                </table>
            </div>



        </div>
        <!-- /.row -->


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; </p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
