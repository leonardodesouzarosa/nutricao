<?php 
require_once("../../conexao.php"); 

$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM ALIMENTO WHERE ID = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);



$pdo->query("DELETE FROM ALIMENTO WHERE ID = '$id'");

echo 'Excluído com Sucesso!';

?>