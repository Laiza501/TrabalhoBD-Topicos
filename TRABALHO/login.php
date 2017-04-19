<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet"> 

 <<script src="jquery-3.2.0.min.js"></script>  
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>     
</head>

<body>


<?php

//INICIA SESSÃO DO LOGIN EFETUADO

session_start();
	
// TESTAR CONEXÃO DO PGADMIN
	$link = pg_connect('host=localhost port=5432 dbname=laiza user=postgres password=123');
	
if (!$link) {
      die("Não foi possível abrir conexão com PGSQL");
}else{
	
// ENTRAR COM A CONEXÃO EFETUADA DO LOGIN INFORMADO, ENVIADO AO FORMULÁRIO COM _POST
$email = $_POST['email2'];
$senha = $_POST['senha2'];

   
	

//REALIZA PESQUISA NA TABELA USUÁRIO PARA VALIDAÇÃO DE EMAIL E SENHA, SE FOR IGUAIS LOGA AO SISTEMA

$result = pg_query("SELECT * FROM usuario WHERE email = '$email' AND senha= '$senha'");

 
//PEGA TODOS OS REGISTROS DA VÁRIAVEL $RESULT
if(pg_num_rows ($result) > 0 )
{

	//A VÁRIAVEL $REGISTROUSUARIO RECEBE $RESULT
$registrousuario = pg_fetch_assoc($result);

 
    // A SESSÃO RECEBE O LOGIN DO BANCO
$_SESSION['idusuario'] = $registrousuario['idusuario'];
$_SESSION['email2'] = $email;
$_SESSION['senha2'] = $senha;

header('location:testebd.php');
}
else{
 	unset ($_SESSION['email2']); //UNSET LIMPA OS REGISTROS DE UMA SESSÃO APÓS FINALIZADA
	unset ($_SESSION['senha2']); //UNSET LIMPA OS REGISTROS DE UMA SESSÃO APÓS FINALIZADA
?> 
    
      
           <!--ALERTA E BOTÃO VOLTAR-->
           <div class="alert alert-danger" role="alert">
  <strong>Usuário não encontrado</strong>
</div>
           
	<div class="col-xs-offset-0"><a href="boot.html" class="btn btn-danger" >Voltar</a></td></div>
<?php
	}
}
?>











 <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>		
</body>
</html>