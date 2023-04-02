<?php 
$pag = "cardapio";
require_once("../conexao.php"); 

/*@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Admin'){
    echo "<script language='javascript'> window.location='../index.php' </script>";

}

*/
?>

<div class="row mt-4 mb-4">
    <a type="button" class="btn-success btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Cardápio</a>
    <a type="button" class="btn-success btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>
    
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Hora Inicio</th>
                        <th>Hora Final</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                   <?php 

                   $query = $pdo->query("SELECT * FROM REFEICAO ORDER BY HORA_INICIAL");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);

                   for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      $descricao = $res[$i]['DESCRICAO'];
                      $horaInicial = $res[$i]['HORA_INICIAL'];
                      $horaFinal = $res[$i]['HORA_FINAL'];
                      $id = $res[$i]['ID'];

                       
                      ?>


                    <tr>
                        <td><?php echo $descricao ?></td>
                        <td><?php echo $horaInicial ?></td>
                        <td><?php echo $horaFinal ?></td>
                        <td>
                             <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                        </td>
                    </tr>
<?php } ?>





                </tbody>
            </table>
        </div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php 
                if (@$_GET['funcao'] == 'editar') {
                    $titulo = "Editar Registro";
                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM REFEICAO WHERE ID = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $edtDescricao = $res[0]['DESCRICAO'];
                    $edtHoraInicial = $res[0]['HORA_INICIAL'];
                    $edtHoraFinal = $res[0]['HORA_FINAL'];

                                                            

                } else {
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
                                    <?php 
                                        $query = $pdo->query("SELECT * FROM SEMANA ORDER BY ID ");
                                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        for ($i=0; $i < @count($res); $i++) { 
                                            foreach ($res[$i] as $key => $value) {
                                            }
                                            $diaSemana = $res[$i]['DIASSEMANA'];
                                            $idDiaSemana = $res[$i]['ID'];
                                            ?>     

                                            <option <?php if(@$edtCategoria == $idDiaSemana){ ?> selected <?php } ?> value="<?php echo $idDiaSemana ?>"><?php echo $diaSemana ?></option>
                                        <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label >Refeição</label>
                                <select name="refeicao" class="form-control" id="refeicao">
                                    <option  selected  value="0">-- Selecione --</option> 
                                    <?php 
                                        $query = $pdo->query("SELECT * FROM REFEICAO ORDER BY  HORA_INICIAL ");
                                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        for ($i=0; $i < @count($res); $i++) { 
                                            foreach ($res[$i] as $key => $value) {
                                            }
                                            $refeicao = $res[$i]['DESCRICAO'];
                                            $hrInicial = $res[$i]['HORA_INICIAL'];
                                            $hrFinal = $res[$i]['HORA_FINAL'];
                                            $id_refeicao = $res[$i]['ID'];
                                            ?>     

                                            <option <?php if(@$edtRefeicao == $id_refeicao){ ?> selected <?php } ?> value="<?php echo $id_refeicao ?>"><?php echo $refeicao ?> | <?php echo $hrInicial ?> | <?php echo $hrFinal ?></option>
                                        <?php } ?>

                                </select>
                            </div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label >Descrição</label>
                        <input value="<?php echo @$edtDescricao ?>" type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Hora Inicial</label>
                                <input value="<?php echo @$edtHoraInicial ?>" type="text" class="form-control" id="hrInicial" name="hrInicial" placeholder="Hora Inicio">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Hora Final</label>
                                <input value="<?php echo @$edtHoraFinal ?>" type="text" class="form-control" id="hrFinal" name="hrFinal" placeholder="Hora Final">
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
                <input value="<?php echo @$edtDescricao ?>" type="hidden" name="antigo" id="antigo">

                    <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div> 
    </div>
</div>






<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p>Deseja realmente Excluir este Registro?</p>

                <div align="center" id="mensagem_excluir" class="">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
                <form method="post">

                    <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php 

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
    echo "<script>$('#modal-deletar').modal('show');</script>";
}

?>




<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
    $("#form").submit(function () {
        var pag = "<?=$pag?>";
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
                    window.location = "index.php?pag="+pag;

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





<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {
        var pag = "<?=$pag?>";
        $('#btn-deletar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/excluir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

                    if (mensagem.trim() === 'Excluído com Sucesso!') {


                        $('#btn-cancelar-excluir').click();
                        window.location = "index.php?pag=" + pag;
                    }

                    $('#mensagem_excluir').text(mensagem)



                },

            })
        })
    })
</script>







<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>



