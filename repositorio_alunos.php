
<?php

 require 'database/conexao.php';
 include 'aluno.class.php';


 interface IRepositorioalunos {
 	public function cadastrarAluno($aluno);
 	public function removerAluno($aluno);
 	public function atualizarAluno($aluno);
 	public function buscarAluno($codigo);
 	public function getListaAlunos($filtro);
 	public function getListaAlunosConcluintes($filtro);
 }

class RepositorioAlunosMySQL implements IRepositorioalunos {

	private $conexao;

	public function __construct()
	{
		$this->conexao = new Conexao("localhost","root","mysql","piweb");

		if ($this->conexao->conectar() == false)
		{
			echo "Erro " . mysqli_error();
		}

	}

	public function cadastrarAluno($aluno)
	{
		$nome		= $aluno->getNome();
		$matricula	= $aluno->getMatricula();
		$curso		= $aluno->getCurso();
		$turno		= $aluno->getTurno();
		$periodo	= $aluno->getPeriodo();

		$sql = "INSERT INTO alunos (nome, matricula, curso, turno, periodo) VALUES 
		('$nome','$matricula','$curso','$turno','$periodo')";
		//print_r($sql);

		$this->conexao->executarQuery($sql);
	}

	public function removerAluno($codigo)
	{

		$sql = " DELETE FROM alunos WHERE codigo='$codigo' ";
		$this->conexao->executarQuery($sql);

	}

	public function atualizarAluno($aluno)
	{


		$nome 		= $aluno->getNome();
		$codigo 	= $aluno->getCodigo();
		$matricula 	= $aluno->getMatricula();
		$curso 		= $aluno->getCurso();
		$turno 		= $aluno->getTurno();
		$periodo 	= $aluno->getPeriodo();



		$sql = "UPDATE alunos SET nome='$nome',nome='$nome',
		curso='$curso',turno='$turno',periodo='$periodo' WHERE codigo = '$codigo' ";

		// echo $sql;
		// die();
		$this->conexao->executarQuery($sql);

	}



	public function buscarAluno($codigo)
	{
		$linha = $this->conexao->obtemPrimeiroRegistroQuery("SELECT * FROM alunos WHERE codigo='$codigo' ");

		$aluno = new Aluno(
				$linha['nome'],
				$linha['codigo'],
				$linha['matricula'],
				$linha['curso'],
				$linha['turno'],
				$linha['periodo']);

		return $aluno;
	}

	public function getListaAlunos($filtro)
	{

		if (isset($filtro))
		{
			$filtro = " WHERE situacao like '%$filtro%' ";
		}
		
		$sql = "SELECT * FROM alunos $filtro ";
		//print_r($sql);

		$listagem = $this->conexao->executarQuery($sql);

		$arrayAlunos = array();

		while( $linha = mysqli_fetch_array($listagem)){
			$aluno = new Aluno(
				$linha['nome'],
				$linha['codigo'],
				$linha['matricula'],
				$linha['curso'],
				$linha['turo'],
				$linha['periodo']);
			array_push($arrayAlunos, $aluno);
		} 
			return $arrayAlunos;
	}

	public function getListaAlunosConcluintes($filtro)
	{

		if (isset($filtro))
		{
			$filtro = " WHERE periodo=4";
		}
		
		$sql = "SELECT * FROM alunos $filtro ";
		//print_r($sql);

		$listagem = $this->conexao->executarQuery($sql);

		$arrayAlunos = array();

		while( $linha = mysqli_fetch_array($listagem)){
			$aluno = new Aluno(
				$linha['nome'],
				$linha['codigo'],
				$linha['matricula'],
				$linha['curso'],
				$linha['turno'],
				$linha['periodo']);
			array_push($arrayAlunos, $aluno);
		} 
			return $arrayAlunos;
	}

	public function getListaAlunosPorCurso($filtro)
	{

		if (isset($filtro))
		{
			$filtro = " WHERE curso='$filtro' ";
		}
		
		$sql = "SELECT * FROM alunos $filtro ";
		//print_r($sql);

		$listagem = $this->conexao->executarQuery($sql);

		$arrayAlunos = array();

		while( $linha = mysqli_fetch_array($listagem)){
			$aluno = new Aluno(
				$linha['nome'],
				$linha['codigo'],
				$linha['matricula'],
				$linha['curso'],
				$linha['turno'],
				$linha['periodo']);
			array_push($arrayAlunos, $aluno);
		} 
			return $arrayAlunos;
	}

}

	$repositorio = new RepositorioAlunosMySQL();

?>