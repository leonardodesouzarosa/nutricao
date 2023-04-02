<?php 
require_once("../../conexao.php"); 

$descricao = $_POST['descricao'];
$hrInicial = $_POST['hrInicial'];
$hrFinal = $_POST['hrFinal'];

$antigo = $_POST['antigo'];
$id = $_POST['txtid2'];

if($descricao == ""){
	echo 'A descrição é Obrigatório!';
	exit();
}

if($hrInicial == ""){
	echo 'A Hora Inicial é Obrigatório!';
	exit();
}

if($hrFinal == ""){
	echo 'A Hora Final é Obrigatório!';
	exit();
}

//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $descricao) {
	$query = $pdo->query("SELECT * FROM REFEICAO WHERE DESCRICAO = '$descricao' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$refeicao = $res[0]['DESCRICAO'];
	$inicial = $res[0]['HORA_INICIAL'];
	$final = $res[0]['HORA_FINAL'];
	
	if($refeicao == $descricao && $hrInicial == $inicial && $hrFinal == $final){
		echo 'Já existe um Refeição Cadastrada com esse Horário!';
		exit();
	}
}


if($id == ""){
	
	$res = $pdo->prepare("INSERT INTO REFEICAO SET DESCRICAO = :descricao, HORA_INICIAL = :hora_inicial, HORA_FINAL = :hora_final");	

}else{

	$res = $pdo->prepare("UPDATE REFEICAO SET DESCRICAO = :descricao, HORA_INICIAL = :hora_inicial, HORA_FINAL = :hora_final WHERE ID = '$id'");
	
}

$res->bindValue(":descricao", $descricao);
$res->bindValue(":hora_inicial", $hrInicial);
$res->bindValue(":hora_final", $hrFinal);
$res->execute();

echo 'Salvo com Sucesso!';

?>