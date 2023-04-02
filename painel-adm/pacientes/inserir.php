<?php 
require_once("../../conexao.php"); 

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$sexo = $_POST['sexo'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];


$antigo = $_POST['antigo'];
$antigo2 = $_POST['antigo2'];
$id = $_POST['txtid2'];

if($nome == ""){
	echo 'O nome é Obrigatório!';
	exit();
}

if($email == ""){
	echo 'O email é Obrigatório!';
	exit();
}

if($cpf == ""){
	echo 'O CPF é Obrigatório!';
	exit();
}

//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $cpf){
	$query = $pdo->query("SELECT * FROM PESSOA WHERE CPF = '$cpf' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O CPF já está Cadastrado!';
		exit();
	}
}


//VERIFICAR SE O REGISTRO COM MESMO EMAIL JÁ EXISTE NO BANCO
if($antigo2 != $email){
	$query = $pdo->query("SELECT * FROM PESSOA WHERE EMAIL = '$email' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O Email já está Cadastrado!';
		exit();
	}
}


//SCRIPT PARA SUBIR FOTO NO BANCO
$nome_img = preg_replace('/[ -]+/' , '-' , @$_FILES['imagem']['name']);
$caminho = '../../img/pacientes/' .$nome_img;
if (@$_FILES['imagem']['name'] == ""){
	$imagem = "sem-foto.jpg";
}else{
	$imagem = $nome_img;
}

$imagem_temp = @$_FILES['imagem']['tmp_name']; 
$ext = pathinfo($imagem, PATHINFO_EXTENSION);   
if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg'){ 
	move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida!';
	exit();
}



if($id == ""){
	$insertPessoa = $pdo->prepare("INSERT INTO PESSOA SET NOME = :nome, CPF = :cpf, SEXO = :sexo, EMAIL = :email, telefone = :telefone, FOTO = '$imagem'");	

	

	$insertPaciente = $pdo->prepare("INSERT INTO PACIENTE SET CODPESSOA = :codpessoa");	
	


	//$res3->bindValue(":senha", '123');
	//$res3->bindValue(":nivel", 'professor');
	$insertPessoa->bindValue(":nome", $nome);
	$insertPessoa->bindValue(":cpf", $cpf);
	$insertPessoa->bindValue(":sexo", $sexo);
	$insertPessoa->bindValue(":email", $email);
	$insertPessoa->bindValue(":telefone", $telefone);
	$insertPessoa->execute();

	$codpessoa = $pdo->lastInsertId();
	$insertPaciente->bindValue(":codpessoa", $codpessoa);
	$insertPaciente->execute();

}else{
	if($imagem == "sem-foto.jpg") {
		$edtPessoa = $pdo->prepare("UPDATE PESSOA SET NOME = :nome, CPF = :cpf, SEXO = :sexo, EMAIL = :email, telefone = :telefone WHERE ID = '$id'");
	
	} else {
		$edtPessoa = $pdo->prepare("UPDATE PESSOA SET NOME = :nome, CPF = :cpf, SEXO = :sexo, EMAIL = :email, telefone = :telefone, FOTO = '$imagem' WHERE ID = '$id'");	
	}

	//$edtPaciente = $pdo->prepare("UPDATE PACIENTE SET CRN = :crn WHERE CODPESSOA = '$id'");

	$edtPessoa->bindValue(":nome", $nome);
	$edtPessoa->bindValue(":cpf", $cpf);
	$edtPessoa->bindValue(":sexo", $sexo);
	$edtPessoa->bindValue(":email", $email);
	$edtPessoa->bindValue(":telefone", $telefone);
	$edtPessoa->execute();

	//$edtNutricionista->bindValue(":crn", $crn);
	//$edtNutricionista->execute();	
}



//$res2->bindValue(":cpf", $cpf);
//$res2->bindValue(":email", $email);

echo 'Salvo com Sucesso!';

?>