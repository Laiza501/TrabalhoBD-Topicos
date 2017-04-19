<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet"> 

 
  
  <script src="jquery-3.2.0.min.js"></script>  
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>   
  
</head>

<body>



<!------------------------CADASTRO------------------------------------------------> 
  


<?php
//Faz a conexão om o banco
$link = pg_connect('host=localhost port=5432 dbname=laiza user=postgres password=123');
if (!$link) {
      die("Não foi possível abrir conexão com PGSQL");
}else{
		 
		 // RECEBE AS VARIAVEIS DO BANCO PARA O FORMULÁRIO
$nome = $_POST['nome_usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];
 
 // REALIZA A CONSULTA DA TABELA DE USUÁRIO
  $sql = "SELECT * FROM usuario WHERE email = '$email'";
  
  //RECEBER A VARIAVEL DA CONSULTA E VERIFICA A LINHA DA CONEXÃO
 $verifica= pg_query($link, $sql);
 
 //PERCORRE A TABELA E CONSULTANDO NA VARIAVEL REGISTRADA $VERIFICA
 if(pg_num_rows ($verifica) > 0){
	 ?>
			<!--CRIAÇÃO DE ALERTA BOOSTRAP-->		
           <div class="alert alert-danger" role="alert">
  <strong>Usuário já cadastrado!</strong>
</div>
          <!--CRIAÇÃO DE BOTÃO BOOSTRAP-->	 
	<div class="col-xs-offset-0"><a href="boot.html" class="btn btn-danger" >Voltar</a></td></div>
           
            
<?php 
	 die; //MATA A CONDIÇÃO
	 
	 }else{ //REALIZA O CADASTRO INSERINDO OS VALORES DO _POST
 $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

  //Invoca o método pg_query passando o ponteiro de conexão com o PostgreSQL e a string contendo a instrução SQL.  
      pg_query($link, $sql);
       /**
           Fecha a conexão com o PostgreSQL
       */
       pg_close($link);
	   
	   header('location:boot.html');
  }
	
}
   
  
  

?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>