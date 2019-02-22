<?php

	require 'repositorio_alunos.php';

	$alunoRecebido = new Aluno(
			$_REQUEST['nome'],
			null,
			$_REQUEST['matricula'],
			$_REQUEST['curso'],
			$_REQUEST['turno'],
			$_REQUEST['periodo']
		);

	$repositorio->cadastrarAluno($alunoRecebido);

	header('Location: alunos.php');
	exit;


?>