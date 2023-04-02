<?php
@session_start();
$cpf_usuario = @$_SESSION['cpf_usuario'];
if(@$_SESSION['nivel_usuario'] == null || @$_SESSION['nivel_usuario'] != 'nutricionista'){
	echo "<script language='javascript'> window.location='../index.php' </script>";
	exit();
}

require_once("../conexao.php"); 


/*
//totais dos cards
$hoje = date('Y-m-d');
$mes_atual = Date('m');
$ano_atual = Date('Y');
$dataInicioMes = $ano_atual."-".$mes_atual."-01";



$query = $pdo->query("SELECT * FROM professores where cpf = '$cpf_usuario' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_prof = $res[0]['id'];

$query = $pdo->query("SELECT * FROM turmas where professor = '$id_prof'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$totalDisc = @count($res);

$query = $pdo->query("SELECT * FROM turmas where professor = '$id_prof' and data_final >= curDate()");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$totalAndamento = @count($res);

$query = $pdo->query("SELECT * FROM turmas where professor = '$id_prof' and data_final < curDate()");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$totalConcluidas = @count($res);

*/

$query = $pdo->query("SELECT N.ID AS 'IDNUTRI' FROM NUTRICIONISTA AS N INNER JOIN PESSOA AS P ON P.ID = N.CODPESSOA WHERE P.CPF = '$cpf_usuario' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$totalPacientes = 0;
for ($i=0; $i < count($res); $i++) { 
	foreach ($res[$i] as $key => $value) {
	}
	
	$id_nutricionista = $res[$i]['IDNUTRI'];

	$query2 = $pdo->query("SELECT * FROM PACIENTE_NUTRICIONISTA where NUTRICIONISTA = '$id_nutricionista'");
	$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
	$totalPacientes = @count($res2);
	
}



?>








<div class="row">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Disciplinas Ministradas</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalDisc ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-info"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-secondary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total de Pacientes</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalPacientes ?> </div>
					</div>
					<div class="col-auto">
						<i class="fas fa-users fa-2x text-secondary"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Turmas em Andamentos</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalAndamento ?> </div>
					</div>
					<div class="col-auto" align="center">
						<i class="fas fa-clipboard-list fa-2x text-danger"></i>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Turmas Concluídas</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalConcluidas ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-success"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>




<div class="row">

	<?php 

	$query = $pdo->query("SELECT * FROM NUTRICIONISTA AS N INNER JOIN PESSOA AS P ON P.ID = N.CODPESSOA WHERE P.CPF = '$cpf_usuario' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$id_nutricionista = $res[0]['ID'];



	$query = $pdo->query("SELECT PN.ID AS 'CODIGO', PN.PACIENTE AS 'IDPACIENTE', P.* FROM PACIENTE_NUTRICIONISTA AS PN JOIN PACIENTE AS PA ON PA.ID = PN.PACIENTE INNER JOIN PESSOA AS P ON P.ID = PA.CODPESSOA WHERE NUTRICIONISTA = '$id_nutricionista' ORDER BY P.NOME");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	for ($i=0; $i < count($res); $i++) { 
		foreach ($res[$i] as $key => $value) {
		}
		$paciente = $res[$i]['IDPACIENTE'];
		$idPacNutri = $res[$i]['CODIGO'];

		$nome_paciente = $res[$i]['NOME'];
		$email_paciente = $res[$i]['EMAIL'];
		$telefone_paciente = $res[$i]['TELEFONE'];
		$foto_paciente = $res[$i]['FOTO']
		/*
		$query_resp = $pdo->query("SELECT * FROM PACIENTE AS PA INNER JOIN PESSOA AS P ON P.ID = PA.CODPESSOA WHERE PA.ID = '$paciente' ORDER BY P.NOME");
		$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);

		$nome_paciente = $res_resp[0]['NOME'];
		$email_paciente = $res_resp[0]['EMAIL'];
		$telefone_paciente = $res_resp[0]['TELEFONE'];
		$foto_paciente = $res_resp[0]['FOTO']

		*/
		
		?>	

		<div class="col-xl-3 col-md-6 mb-4">
			<a class="text-dark" href="index.php?pag=ver-paciente&id=<?php echo $paciente ?>" title="Informações da Turma">
				<div class="card text-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold  text-success text-uppercase"><?php echo $nome_paciente ?></div>
								<div class="text-xs text-secondary"><?php echo $email_paciente ?> <br> <?php echo $telefone_paciente ?> </div>
							</div>
							<div class="col-auto" align="center">
								  <img src="../img/pacientes/<?php echo $foto_paciente ?>" width="78">
								
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>



	<?php } ?>

</div>




