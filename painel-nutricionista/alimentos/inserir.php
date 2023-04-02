<?php 
require_once("../../conexao.php"); 

$alimento = $_POST['alimento'];
$categoria = $_POST['categoria'];

$antigo = $_POST['antigo'];
$id = $_POST['txtid2'];

if($alimento == ""){
	echo 'A Nome é Obrigatório!';
	exit();
}

if($categoria == 0){
	echo 'A Categoria é Obrigatória!';
	exit();
}

//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $alimento){
	$query = $pdo->query("SELECT * FROM ALIMENTO WHERE DESCRICAO = '$alimento' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'A descrição já está Cadastrado!';
		exit();
	}
}


if($id == ""){
	
	$res = $pdo->prepare("INSERT INTO ALIMENTO SET DESCRICAO = :alimento, CATEGORIA = :idCat");	

}else{

	$res = $pdo->prepare("UPDATE ALIMENTO SET DESCRICAO = :alimento, CATEGORIA = :idCat WHERE ID = '$id'");
	
}

$res->bindValue(":alimento", $alimento);
$res->bindValue(":idCat", $categoria);
$res->execute();

echo 'Salvo com Sucesso!';

?>