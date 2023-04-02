<?php 
require_once("../../conexao.php"); 

$nutricionista = $_POST['nutricionista'];
$paciente = $_POST['paciente'];

$antigo = $_POST['antigo'];
$id = $_POST['txtid2'];
/*
if($descricao == ""){
	echo 'A descrição é Obrigatório!';
	exit();
}

if($hrInicial == ""){
	echo 'A Hora Inicial é Obrigatório!';
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
*/

if($id == ""){
	
	$res = $pdo->prepare("INSERT INTO PACIENTE_NUTRICIONISTA SET PACIENTE = :paciente, NUTRICIONISTA = :nutricionista ");	

}else{

	$res = $pdo->prepare("UPDATE PACIENTE_NUTRICIONISTA SET PACIENTE = :paciente, NUTRICIONISTA = :nutricionista WHERE ID = '$id'");
	
}

$res->bindValue(":nutricionista", $nutricionista);
$res->bindValue(":paciente", $paciente);
$res->execute();

echo 'Salvo com Sucesso!';

?>