<?php 
$pag = "paciente-nutricionista";
require_once("../conexao.php"); 

@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'admin'){
    echo "<script language='javascript'> window.location='../login.php' </script>";

}


?>

<div class="row mt-4 mb-4">
    <a type="button" class="btn-success btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Paciente / Nutricionista</a>
    <a type="button" class="btn-success btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>
    
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nutricionista</th>
                        <th>Paciente</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                   <?php 

                   $query = $pdo->query("SELECT * FROM PACIENTE_NUTRICIONISTA");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);

                   for ($i=0; $i < count($res); $i++) { 
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nutricionista = $res[$i]['NUTRICIONISTA'];
                        $paciente = $res[$i]['PACIENTE'];
                        $id = $res[$i]['ID'];
                            
                        $query_nutricionista = $pdo->query("SELECT * FROM NUTRICIONISTA AS N INNER JOIN PESSOA AS P ON P.ID = N.CODPESSOA WHERE N.ID = '$nutricionista' order by NOME");
                        $res_nutri = $query_nutricionista->fetchAll(PDO::FETCH_ASSOC);

                        $nome_nutricionista = $res_nutri[0]["NOME"];

                        $query_paciente = $pdo->query("SELECT * FROM PACIENTE AS PA INNER JOIN PESSOA AS P ON P.ID = PA.CODPESSOA WHERE PA.ID = '$paciente' order by NOME");
                        $res_paci = $query_paciente->fetchAll(PDO::FETCH_ASSOC);

                        $nome_paciente = $res_paci[0]["NOME"];
                      ?>


                    <tr>
                        <td><?php echo $nome_nutricionista ?></td>
                        <td><?php echo $nome_paciente ?></td>
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

                    $query = $pdo->query("SELECT * FROM NUTRI WHERE ID = '" . $id2 . "' ");
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
                                <label >Nutricionista</label>
                                <select name="nutricionista" class="form-control" id="nutricionista">
                                    <option  selected  value="0">-- Selecione --</option> 
                                    <?php 
                                        $query = $pdo->query("SELECT N.ID AS 'ID_NUTRICIONISTA',P.NOME AS 'NOME' FROM NUTRICIONISTA AS N INNER JOIN PESSOA AS P ON P.ID = N.CODPESSOA order by NOME");
                                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        for ($i=0; $i < @count($res); $i++) { 
                                            foreach ($res[$i] as $key => $value) {
                                            }
                                            $nutricionista = $res[$i]['NOME'];
                                            $id_nutricionista = $res[$i]['ID_NUTRICIONISTA'];
                                            ?>     

                                            <option <?php if(@$edtCategoria == $id_nutricionista){ ?> selected <?php } ?> value="<?php echo $id_nutricionista ?>"><?php echo $nutricionista ?></option>
                                        <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label >Paciente</label>
                                <select name="paciente" class="form-control" id="paciente">
                                    <option  selected  value="0">-- Selecione --</option> 
                                    <?php 
                                        $query = $pdo->query("SELECT PA.ID AS 'ID_PACIENTE', P.NOME AS 'NOME' FROM PACIENTE AS PA INNER JOIN PESSOA AS P ON P.ID = PA.CODPESSOA order by NOME");
                                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        for ($i=0; $i < @count($res); $i++) { 
                                            foreach ($res[$i] as $key => $value) {
                                            }
                                            $paciente = $res[$i]['NOME'];
                                            $id_paciente = $res[$i]['ID_PACIENTE'];
                                            ?>     

                                            <option <?php if(@$edtRefeicao == $id_paciente){ ?> selected <?php } ?> value="<?php echo $id_paciente ?>"><?php echo $paciente ?></option>
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



