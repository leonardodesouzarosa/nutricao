<?php 

@session_start();
$pag = "ver-paciente";

require_once("../conexao.php"); 

$id_paciente = $_GET['id'];

$query_2 = $pdo->query("SELECT * FROM PACIENTE AS PA INNER JOIN PESSOA AS P ON P.ID = PA.CODPESSOA WHERE PA.ID = '$id_paciente'");
$res_2 = $query_2->fetchAll(PDO::FETCH_ASSOC);
$nome_paciente = $res_2[0]['NOME'];
$foto_paciente = $res_2[0]['FOTO'];
$email_paciente = $res_2[0]['EMAIL'];
$telefone_paciente = $res_2[0]['TELEFONE'];
$sexo_paciente = $res_2[0]['SEXO'];
$altura_paciente = $res_2[0]['ALTURA'];
$peso_paciente = $res_2[0]['PESO'];


/*
$horario = $res_2[0]['horario'];
$dia = $res_2[0]['dia'];
$ano = $res_2[0]['ano'];
$data_final = $res_2[0]['data_final'];
$data_inicio = $res_2[0]['data_inicio'];
$professor = $res_2[0]['professor'];


                    //RECUPERAR O TOTAL DE MESES ENTRE DATAS
$d1 = new DateTime($data_inicio);
$d2 = new DateTime($data_final);
$intervalo = $d1->diff( $d2 );
$anos = $intervalo->y;
$meses = $intervalo->m + ($anos * 12);

$data_finalF = implode('/', array_reverse(explode('-', $data_final)));

$query_resp = $pdo->query("SELECT * FROM disciplinas where id = '$disciplina' ");
$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);                    
$nome_disc = $res_resp[0]['nome'];


$query_resp = $pdo->query("SELECT * FROM professores where id = '$professor' ");
$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);                    
$nome_prof = $res_resp[0]['nome'];
$email_prof = $res_resp[0]['email'];
$imagem_prof = $res_resp[0]['foto'];


$query_resp = $pdo->query("SELECT * FROM matriculas where turma = '$id_turma' ");
$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);                    
$total_alunos = @count($res_resp);

$id_get_periodo = @$_GET['id_periodo'];

$query_resp = $pdo->query("SELECT * FROM aulas where turma = '$id_turma' and periodo = '$id_get_periodo'");
$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);                 
$total_aulas = @count($res_resp);



$query_resp = $pdo->query("SELECT * FROM periodos where id = '$id_get_periodo' ");
$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);                 
$nome_periodo = $res_resp[0]['nome'];
$maximo_nota = $res_resp[0]['total_pontos'];


if($data_final < date('Y-m-d')){
 $concluido = 'Sim';
}else{
 $concluido = 'Não';
}
*/
?>

<!-- INFORMAÇÕES DO PACIENTE -->

<h4>DADOS DO PACIENTE</h4>

<hr>

<small>
  <div class="mb-3">
    <div class="row">
      <div class="col-md-2">
        <img class="mr-3" src="../img/pacientes/<?php echo $foto_paciente ?>" width="100%"> 
      </div>
      <div class="col-md-10">
        <div class="row mb-1">
          <div class="col-md-6">
            <span class="mr-3"><i><b>Nome do Paciente:</b> <?php echo $nome_paciente ?></i></span>
          </div>
          <div class="col-3">
            <span class="mr-3"><i><b>Data Nascimento:</b> <?php echo 'criar' ?></i></span>
          </div>
          <div class="col-2">
            <span class="mr-3"><i><b>Idade:</b> <?php echo 'criar' ?></i></span>
          </div>
        </div>
        <div class="row mb-1">
          <div class="col-6">
            <span class="mr-3"><i><b>E-mail:</b> <?php echo $email_paciente ?></i></span>
          </div>
          <div class="col-3">
            <span class="mr-3"><i><b>Sexo:</b> <?php echo $sexo_paciente ?></i></span>
          </div>
          <div class="col-2">
            <span class="mr-3"><i><b>Altura:</b> <?php echo $altura_paciente ?></i></span>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <span class="mr-3"><i><b>Telefone:</b> <?php echo $telefone_paciente ?></i></span>
          </div>
          <div class="col-3">
            <span class="mr-3"><i><b>Peso:</b> <?php echo $peso_paciente ?></i></span>
          </div>
          <div class="col-2">
            <span class="mr-3"><i><b>Teste:</b> <?php echo 'criar' ?></i></span>
          </div>
        </div>
      </div>
    </div>  
  </div>
    
</small>

<hr>

<!-- CARDS DO CARDÁPIO -->

<div class="row">

  <div class="col-xl-3 col-md-6 mb-4">
   <a class="text-dark" href="index.php?pag=<?php echo $pag ?>&funcao=montarCardapio&id=<?php echo $id_paciente?>" title="Montar Cadápio">
     <div class="card text-danger shadow h-100 py-2">
      <div class="card-body">
       <div class="row no-gutters align-items-center">
        <div class="col mr-2">
         <div class="text-xs font-weight-bold  text-danger text-uppercase">Cadastro</div>
         <div class="text-xs text-secondary">CRIAR CARDÁPIO DO DIA</div>
       </div>
       <div class="col-auto" align="center">
         <i class="far fa-list-alt fa-2x  text-danger"></i><br>
         <span class="text-xs"></span>
       </div>
     </div>
   </div>
 </div>
</a>
</div>




<div class="col-xl-3 col-md-6 mb-4">
  <a class="text-dark" href="index.php?pag=turma&funcao=periodos&id=<?php echo $id_turma ?>&notas=sim" title="Informações da Turma">
   <div class="card text-primary shadow h-100 py-2">
    <div class="card-body">
     <div class="row no-gutters align-items-center">
      <div class="col mr-2">
       <div class="text-xs font-weight-bold  text-primary text-uppercase">BOLETIM</div>
       <div class="text-xs text-secondary"> LANÇAR NOTAS</div>
     </div>
     <div class="col-auto" align="center">
       <i class="fas fa-file-invoice fa-2x  text-primary"></i><br>
       <span class="text-xs"></span>
     </div>
   </div>
 </div>
</div>
</a>
</div>




<div class="col-xl-3 col-md-6 mb-4">
  <a class="text-dark" href="index.php?pag=turma&funcao=periodos&id=<?php echo $id_turma ?>&aulas=sim" title="Lançar Aulas">
   <div class="card text-info shadow h-100 py-2">
    <div class="card-body">
     <div class="row no-gutters align-items-center">
      <div class="col mr-2">
       <div class="text-xs font-weight-bold  text-info text-uppercase">AULAS</div>
       <div class="text-xs text-secondary"> GRADE DO CURSO</div>
     </div>
     <div class="col-auto" align="center">
       <i class="fas fa-video fa-2x  text-info"></i><br>
       <span class="text-xs"></span>
     </div>
   </div>
 </div>
</div>
</a>
</div>





<div class="col-xl-3 col-md-6 mb-4">
  <a class="text-dark" href="index.php?pag=periodos&id=<?php echo $id_turma ?>" title="Cadastro de Períodos">
    <div class="card text-dark shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold  text-dark text-uppercase">PERÍODOS</div>
            <div class="text-xs text-secondary"> PERÍODOS DO CURSO</div>
          </div>
          <div class="col-auto" align="center">
            <i class="fas fa-calendar-day fa-2x  text-dark"></i><br>
            <span class="text-xs"></span>
          </div>
        </div>
      </div>
    </div>
  </a>
</div>


</div>

<!-- MODAL DO CARDÁPIO  -->

<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php 
                if (@$_GET['funcao'] == 'editar') {
                    $titulo = "Editar Registro";
                    $id2 = $_GET['id'];

                    $editarCardapio = $pdo->query("SELECT * FROM CARDAPIO WHERE SEMANA = '$semana' AND PACIENTE = '$paciente' AND REFEICAO = '$refeicao");
                    $edtCardapio = $editarCardapio->fetchAll(PDO::FETCH_ASSOC);

                    $edtSemana = $edtCardapio[0]['SEMANA'];
                    $edtRefeicao = $edtCardapio[0]['REFEICAO'];
                } else{
                  $titulo = "Inserir Registro";
                }

                ?>
                
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST">
              <div class="modal-body">
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                        <label >Dia da Semana</label>
                        <select name="semana" class="form-control" id="semana">
                          <option  selected  value="0">-- Selecione --</option>
                          <!-- CONSULTAR PARA LISTAR OS DIAS DA SEMANA -->
                          <?php 
                            $querySemana = $pdo->query("SELECT * FROM SEMANA ORDER BY ID");
                            $res = $querySemana->fetchAll(PDO::FETCH_ASSOC);
                                        
                            for ($i=0; $i < @count($res); $i++) { 
                              foreach ($res[$i] as $key => $value) {
                              }
                              $semana = $res[$i]['DIASSEMANA'];
                              $id_semana= $res[$i]['ID'];
                              ?>     
                          <option <?php if(@$edtSemana == $id_semana){ ?> selected <?php } ?> value="<?php echo $id_semana ?>"><?php echo $semana ?></option>
                          <?php } ?>
                        </select>
                    </div>
                  </div>
                </div>


                <small>
                    <div id="mensagem">

                    </div>
                </small> 

              </div>



              <div class="modal-footer">

                  <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
                  <input value="<?php echo @$id_paciente ?>" type="hidden" name="paciente" id="paciente">
                  <input value="<?php echo @$edtSemana ?>" type="hidden" name="antigo" id="antigo">



                  <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-success">Salvar</button>
              </div>
            </form>
</div>
</div>
</div>

<div class="row">
<?php

  $selectCardapio = $pdo->query("SELECT * FROM CARDAPIO_SEMANA AS C INNER JOIN SEMANA S ON C.SEMANA = S.ID WHERE PACIENTE = '$id_paciente' ORDER BY S.ID");
  $resCardapio = $selectCardapio->fetchAll(PDO::FETCH_ASSOC);
  
  for ($i=0; $i < count($resCardapio); $i++) { 
    foreach ($resCardapio[$i] as $key => $value) {
    }
    $dia_semana = $resCardapio[$i]['DIASSEMANA'];

?>

<div class="col-xl-6 col-md-6 mb-4">
    <div class="card text-dark shadow h-100 py-2">
      <div class="card-body">

        <div class="row mt-10 no-gutters align-items-center">
          <div class="col-12 mr-3" align="center">
            <h6><?php echo $dia_semana ?></h6>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col-mr-6">Refeição</th>
                    <th scope="col-2">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  


                    <tr>
                        <td></td>
                        <td>
                             <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php } ?>

</div>

<hr>
<?php 

// FUNÇÕES DE CHAMADA DE MODAL

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "montarCardapio") {
  echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "aulas") {
  echo "<script>$('#modal-aulas').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "periodos") {
  echo "<script>$('#modal-periodos').modal('show');</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "notas") {
  echo "<script>$('#modal-notas').modal('show');</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "chamada") {
  echo "<script>$('#modal-chamada-aulas').modal('show');</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "fazerchamada") {
  echo "<script>$('#modal-chamada').modal('show');</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "presenca") {
  
  $id_turma_chamada = $_GET['id'];
  $id_aluno_chamada = $_GET['id_aluno'];
  $id_aula_chamada = $_GET['id_aula'];
  $id_periodo_chamada = $_GET['id_periodo'];

  $query = $pdo->query("SELECT * FROM chamadas where turma = '$id_turma_chamada' and aluno = '$id_aluno_chamada' and aula = '$id_aula_chamada' ");
  $res = $query->fetchAll(PDO::FETCH_ASSOC);
  if(@count($res) > 0){
    $id_chamada = $res[0]['id'];
    $pdo->query("UPDATE chamadas SET presenca = 'P' where id = '$id_chamada'");
  }else{
      $pdo->query("INSERT INTO chamadas SET turma = '$id_turma_chamada', aluno =  '$id_aluno_chamada', aula = '$id_aula_chamada', presenca = 'P', data = curDate()");
  }

   echo "<script>window.location='index.php?pag=$pag&funcao=fazerchamada&id=$id_turma_chamada&id_periodo=$id_periodo_chamada&id_aula=$id_aula_chamada';</script>";


}



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "falta") {
  
  $id_turma_chamada = $_GET['id'];
  $id_aluno_chamada = $_GET['id_aluno'];
  $id_aula_chamada = $_GET['id_aula'];
  $id_periodo_chamada = $_GET['id_periodo'];

  $query = $pdo->query("SELECT * FROM chamadas where turma = '$id_turma_chamada' and aluno = '$id_aluno_chamada' and aula = '$id_aula_chamada' ");
  $res = $query->fetchAll(PDO::FETCH_ASSOC);
  if(@count($res) > 0){
    $id_chamada = $res[0]['id'];
    $pdo->query("UPDATE chamadas SET presenca = 'F' where id = '$id_chamada'");
  }else{
      $pdo->query("INSERT INTO chamadas SET turma = '$id_turma_chamada', aluno =  '$id_aluno_chamada', aula = '$id_aula_chamada', presenca = 'F', data = curDate()");
  }

   echo "<script>window.location='index.php?pag=$pag&funcao=fazerchamada&id=$id_turma_chamada&id_periodo=$id_periodo_chamada&id_aula=$id_aula_chamada';</script>";


}



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "justificado") {
  
  $id_turma_chamada = $_GET['id'];
  $id_aluno_chamada = $_GET['id_aluno'];
  $id_aula_chamada = $_GET['id_aula'];
  $id_periodo_chamada = $_GET['id_periodo'];

  $query = $pdo->query("SELECT * FROM chamadas where turma = '$id_turma_chamada' and aluno = '$id_aluno_chamada' and aula = '$id_aula_chamada' ");
  $res = $query->fetchAll(PDO::FETCH_ASSOC);
  if(@count($res) > 0){
    $id_chamada = $res[0]['id'];
    $pdo->query("UPDATE chamadas SET presenca = 'J' where id = '$id_chamada'");
  }else{
      $pdo->query("INSERT INTO chamadas SET turma = '$id_turma_chamada', aluno =  '$id_aluno_chamada', aula = '$id_aula_chamada', presenca = 'J', data = curDate()");
  }

   echo "<script>window.location='index.php?pag=$pag&funcao=fazerchamada&id=$id_turma_chamada&id_periodo=$id_periodo_chamada&id_aula=$id_aula_chamada';</script>";


}

?>

<!--AJAX PARA INSERÇÃO E EDIÇÃO DO CARDÁPIO -->
<script type="text/javascript">
    $("#form").submit(function () {
        var pag = "<?=$pag?>";
        var id_paciente = "<?=$id_paciente?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/inserir.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!") {
                    
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar').click();
                    window.location = "index.php?pag="+pag+"&id="+id_paciente;

                } else {

                    $('#mensagem').addClass('text-danger')
                }

                $('#mensagem').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });
</script>




<!--AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
  $(document).ready(function(){
   listarDados();
   listarAulasChamada();

 })
</script>


<script type="text/javascript">
  function listarDados(){
    var pag = "<?=$pag?>";
    var turma = "<?=$id_turma?>";
    var periodo = "<?=$id_per?>";
    console.log(periodo)
    $.ajax({
     url: pag + "/listar-aulas.php",
     method: "post",
     data: {turma, periodo},
     dataType: "html",
     success: function(result){
      $('#listar-aulas').html(result)

    },


  })
  }
</script>




<script type="text/javascript">
  function listarAulasChamada(){
    var pag = "<?=$pag?>";
    var turma = "<?=$id_turma?>";
    var periodo = "<?=$id_per?>";
    console.log(periodo)
    $.ajax({
     url: pag + "/listar-aulas-chamada.php",
     method: "post",
     data: {turma, periodo},
     dataType: "html",
     success: function(result){
      $('#listar-aulas-chamada').html(result)

    },


  })
  }
</script>


<script type="text/javascript">
  function listarDadosNotas(aluno){
    var pag = "<?=$pag?>";
    var turma = "<?=$id_turma?>";
    var periodo = "<?=$id_per?>";
    
    $.ajax({
     url: pag + "/listar-notas.php",
     method: "post",
     data: {turma, periodo, aluno},
     dataType: "html",
     success: function(result){
      $('#listar-notas').html(result)

    },


  })
  }
</script>



<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
  $("#form").submit(function () {
    var pag = "<?=$pag?>";
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: pag + "/inserir-aula.php",
      type: 'POST',
      data: formData,

      success: function (mensagem) {

        $('#mensagem').removeClass()

        if (mensagem.trim() == "Salvo com Sucesso!") {

          $('#nome').val('');
          $('#descricao').val('');
          listarDados();

        } else {

          $('#mensagem').addClass('text-danger')
        }

        $('#mensagem').text(mensagem)

      },

      cache: false,
      contentType: false,
      processData: false,
            xhr: function () {  // Custom XMLHttpRequest
              var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                  myXhr.upload.addEventListener('progress', function () {
                    /* faz alguma coisa durante o progresso do upload */
                  }, false);
                }
                return myXhr;
              }
            });
  });
</script>







<script type="text/javascript">
  function deletarAula(idaula) {
    event.preventDefault();
    var pag = "<?=$pag?>";
    
      $.ajax({
        url: pag + "/excluir-aula.php",
        method: "post",
        data: {idaula},
        dataType: "text",
        success: function (mensagem) {

          if (mensagem.trim() === 'Excluído com Sucesso!') {


            listarDados();
          }

         

        },

      })
    }
  
</script>





<script type="text/javascript">
  function upload(idaula) {
    event.preventDefault();
    var pag = "<?=$pag?>";
       document.getElementById('txtidaula').value = idaula;
      $('#modal-upload').modal('show');
    }
  
</script>





<!--SCRIPT PARA CARREGAR IMAGEM -->
<script type="text/javascript">

    function carregarImg() {

        var target = document.getElementById('target');
        var file = document.querySelector("input[type=file]").files[0];


        var arquivo = file['name'];
        resultado = arquivo.split(".", 2);
        //console.log(resultado[1]);

        if(resultado[1] === 'pdf'){
            $('#target').attr('src', "../img/arquivos-aula/pdf.png");
            return;
        }

         if(resultado[1] === 'rar'){
            $('#target').attr('src', "../img/arquivos-aula/zip.png");
            return;
        }


         if(resultado[1] === 'zip'){
            $('#target').attr('src', "../img/arquivos-aula/zip.png");
            return;
        }

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);


        } else {
            target.src = "";
        }
    }

</script>







<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
  $("#form2").submit(function () {
    var pag = "<?=$pag?>";
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: pag + "/upload.php",
      type: 'POST',
      data: formData,

      success: function (mensagem) {

        $('#mensagem').removeClass()

        if (mensagem.trim() == "Salvo com Sucesso!") {

          $('#nome').val('');
          $('#descricao').val('');
          listarDados();
          $('#btn-cancelar-upload').click();

        } else {

          $('#mensagem-upload').addClass('text-danger')
        }

        $('#mensagem-upload').text(mensagem)

      },

      cache: false,
      contentType: false,
      processData: false,
            xhr: function () {  // Custom XMLHttpRequest
              var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                  myXhr.upload.addEventListener('progress', function () {
                    /* faz alguma coisa durante o progresso do upload */
                  }, false);
                }
                return myXhr;
              }
            });
  });
</script>




<script type="text/javascript">
  function lancarNotas(idaluno, nomealuno, maximonota) {
    event.preventDefault();
    
    var pag = "<?=$pag?>";
       document.getElementById('txtidaluno').value = idaluno;
       
       $("#txtnomealuno").text(nomealuno);
       $("#maximonota").text(maximonota);

       listarDadosNotas(idaluno);

       $('#modal-lancar-notas').modal('show');
    }
  
</script>






<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
  $("#form-notas").submit(function () {
    var pag = "<?=$pag?>";
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: pag + "/inserir-nota.php",
      type: 'POST',
      data: formData,

      success: function (mensagem) {

        $('#mensagem-notas').removeClass()

        if (mensagem.trim() == "Salvo com Sucesso!") {

          $('#descricao-nota').val('');
          $('#nota').val('');
          $('#nota-max').val('');
          listarDadosNotas(document.getElementById('txtidaluno').value);

        } else {

          $('#mensagem-notas').addClass('text-danger')
        }

        $('#mensagem-notas').text(mensagem)

      },

      cache: false,
      contentType: false,
      processData: false,
            xhr: function () {  // Custom XMLHttpRequest
              var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                  myXhr.upload.addEventListener('progress', function () {
                    /* faz alguma coisa durante o progresso do upload */
                  }, false);
                }
                return myXhr;
              }
            });
  });
</script>






<script type="text/javascript">
  function deletarNota(idnota) {
    event.preventDefault();
    var pag = "<?=$pag?>";
    
      $.ajax({
        url: pag + "/excluir-nota.php",
        method: "post",
        data: {idnota},
        dataType: "text",
        success: function (mensagem) {

          if (mensagem.trim() === 'Excluído com Sucesso!') {


            listarDadosNotas(document.getElementById('txtidaluno').value);
          }

         

        },

      })
    }
  
</script>


