<?php

	/**
	*  Filme
	*/
	class Aluno
	{
		private $nome;
		private $codigo;
		private $matricula;
		private $curso;
		private $turno;
		private $periodo;
		
		function __construct($nome,$codigo,$matricula,$curso,$turno,$periodo)
		{
			$this->nome 		= $nome;
			$this->codigo 		= $codigo;
			$this->matricula 	= $matricula;
			$this->curso 		= $curso;
			$this->turno 		= $turno;
			$this->periodo 		= $periodo;
		}

		public function setNome($nome)
		{
			$this->nome =  $nome;
		}

		public function getNome()
		{
			return $this->nome;
		}


		public function setCodigo($codigo)
		{
			$this->codigo =  $codigo;
		}

		public function getCodigo()
		{
			return $this->codigo;
		}


		public function setMatricula($matricula)
		{
			$this->matricula =  $matricula;
		}

		public function getMatricula()
		{
			return $this->matricula;
		}


		public function setCurso($curso)
		{
			$this->curso =  $curso;
		}

		public function getCurso()
		{
			return $this->curso;
		}


		public function setTurno($turno)
		{
			$this->turno =  $turno;
		}

		public function getTurno()
		{
			return $this->turno;
		}

		public function setPeriodo($periodo)
		{
			$this->periodo =  $periodo;
		}

		public function getPeriodo()
		{
			return $this->periodo;
		}

	

	}