<?php

	require 'repositorio_alunos.php';

	$repositorio->removerAluno($_REQUEST['codigo']);

	header('Location: alunos.php');
	exit;

?>