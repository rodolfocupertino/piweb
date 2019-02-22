<?php

	require 'repositorio_alunos.php';

	$alunoRecebido = new Aluno(
			$_REQUEST['nome'],
			$_REQUEST['codigo'],
			$_REQUEST['matricula'],
			$_REQUEST['curso'],
			$_REQUEST['turno'],
			$_REQUEST['periodo']
		);

	$repositorio->atualizarAluno($alunoRecebido);

	header('Location: alunos.php');
	exit;

?>