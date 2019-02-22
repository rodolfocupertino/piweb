<?php


class Conexao {

   private $host; 
   private $usuario; 
   private $senha; 
   private $banco; 
   private $conexao;
   private $sql; 

   function __construct($host,$usuario,$senha,$banco)
   {

      $this->host    = $host;
      $this->usuario = $usuario;
      $this->senha   = $senha;
      $this->banco   = $banco;
   }


 
   function conectar()
   {
      
      $this->conexao = mysqli_connect(
         $this->host,
         $this->usuario,
         $this->senha,
         $this->banco);

      if ( mysqli_connect_error($this->conexao) )
      {
         
         return false;

      }
      else 
      {
         mysqli_query($this->conexao, "SET NAMES 'utf-8'");
         return true;

      }

       
   }
 
   function executarQuery($sql)
   {
   
      return mysqli_query($this->conexao, $sql);
   
   }

   function obtemPrimeiroRegistroQuery($query)
   {
      $linhas = $this->executarQuery($query);
      return mysqli_fetch_array($linhas);

   }
    
}
 
?>