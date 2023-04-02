<?php 
require_once("../../conexao.php"); 

$semana = $_POST['semana'];
$paciente = $_POST['paciente'];

$antigo = $_POST['antigo'];


if($semana == 0){
	echo 'O Dia da Semana é Obrigatório!';
	exit();
}





if($antigo != $semana){
	$query = $pdo->query("SELECT * FROM CARDAPIO_SEMANA WHERE PACIENTE = '$paciente' AND SEMANA = '$semana' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'Já existe um Refeição Cadastrada com esse dia da Semana!';
		exit();
	}
}

$res = $pdo->prepare("INSERT INTO CARDAPIO_SEMANA SET PACIENTE = :paciente, SEMANA = :semana");	

$res->bindValue(":paciente", $paciente);
$res->bindValue(":semana", $semana);

$res->execute();

echo 'Salvo com Sucesso!';

?>