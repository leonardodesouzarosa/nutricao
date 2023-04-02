<?php 
require_once("../../conexao.php"); 

$descricao = $_POST['descricao'];

$antigo = $_POST['antigo'];
$id = $_POST['txtid2'];

if($descricao == ""){
	echo 'A descrição é Obrigatório!';
	exit();
}

//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $descricao){
	$query = $pdo->query("SELECT * FROM CATEGORIA_ALIMENTO WHERE DESCRICAO = '$descricao' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'A descrição já está Cadastrado!';
		exit();
	}
}

if($id == ""){
	
	$res = $pdo->prepare("INSERT INTO CATEGORIA_ALIMENTO SET DESCRICAO = :descricao");	

}else{

	$res = $pdo->prepare("UPDATE CATEGORIA_ALIMENTO SET DESCRICAO = :descricao WHERE ID = '$id'");
	
}

$res->bindValue(":descricao", $descricao);
$res->execute();

echo 'Salvo com Sucesso!';

?>