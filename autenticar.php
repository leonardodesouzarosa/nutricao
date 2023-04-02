<?php 
require_once("conexao.php");
@session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = $pdo->prepare("SELECT * FROM USUARIO WHERE EMAIL = :email AND SENHA = :senha");
$query->bindValue(":senha", $senha);
$query->bindValue(":email", $email);
$query->execute();

$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

	$_SESSION['id_usuario'] = $res[0]['ID'];
	$_SESSION['nome_usuario'] = $res[0]['NOME'];
	$_SESSION['cpf_usuario'] = $res[0]['CPF'];
	$_SESSION['nivel_usuario'] = $res[0]['NIVEL'];

	$nivel = $res[0]['NIVEL'];

	if($nivel == 'admin'){
		echo "<script language='javascript'> window.location='painel-adm' </script>";
	}

	if($nivel == 'nutricionista'){
		echo "<script language='javascript'> window.location='painel-nutricionista' </script>";
	}

	if($nivel == 'secretaria'){
		echo "<script language='javascript'> window.location='painel-secretaria' </script>";
	}
	if($nivel == 'aluno'){
		echo "<script language='javascript'> window.location='painel-aluno' </script>";
	}
	if($nivel == 'tesoureiro'){
		echo "<script language='javascript'> window.location='painel-tesoureiro' </script>";
	}
	
}else{
	echo "<script language='javascript'> window.alert('Usuário ou Senha Incorreta!') </script>";
	echo "<script language='javascript'> window.location='login.php' </script>";	
}


?>