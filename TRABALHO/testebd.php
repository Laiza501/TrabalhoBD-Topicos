<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet"> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	
    
    
	<?php
	
	//------------------------------------------------------------------------------------------------------------
										//PAGINA EVENTO
	//------------------------------------------------------------------------------------------------------------
	
	// Verifica se existe os dados da sessão de login 
if((!isset ($_SESSION['email2']) == true) and (!isset ($_SESSION['senha2']) == true))
{
	
	//UNSET LIMPA OS REGISTROS DE UMA SESSÃO APÓS FINALIZADA
	unset($_SESSION['email2']);
	//UNSET LIMPA OS REGISTROS DE UMA SESSÃO APÓS FINALIZADA
	unset($_SESSION['senha2']);
	
	
	echo "errou";
	header('location:boot.html');
	} //SENAO
	
	// agora ele pega o idusuario do jeito certo
	$idUsuarioMarcado = $_SESSION['idusuario'];
	  	
    $link = pg_connect('host=localhost port=5432 dbname=laiza user=postgres password=123');
	
if (!$link) {
      die("Não foi possível abrir conexão com PGSQL");
}else{	


	if  (isset($_GET["id"])){//VERIFICA SE EXISTE O ID DO EVENTO
		$idEventoCMarcado = $_GET['id'];
		
		
		//ó primeiro vamos pesquisar no banco se já tem um evento cadastrado pra esse usuario
		
		$sql="SELECT * FROM eventocomparecimento WHERE idusuariomarcado = '$idUsuarioMarcado' AND ideventocmarcado= '$idEventoCMarcado'";
		
		$verifica = pg_query($sql);
		if(pg_num_rows ($verifica) > 0){  ?>
        
        <!--CRIAÇÃO DE ALERTA-->
						
            <div class="alert alert-warning alert-dismissable">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Esse registro já existe</strong>
                       </div>
            <a href="testebd.php" class="btn btn-info" >Voltar</a></td>
           
            
<?php die; } else{?> 
	
	
				<!--CRIAÇÃO DE ALERTA-->		
<div class="alert alert-success alert-dismissable">
         <a href="testebd.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Registrado com sucesso</strong>
           </div>
              
           
<?php  };
		
		
		$sql = "INSERT INTO eventocomparecimento (idusuariomarcado, ideventocmarcado) VALUES ($idUsuarioMarcado,$idEventoCMarcado)";
	
      pg_query($link, $sql);
     
	} 
   //criando a query de consulta à tabela criada 
	$sql = "SELECT * FROM evento";
	$consulta = pg_query($sql);
	
	 pg_close($link);
	
	?>
	      
 
	
   <td class="active">
 <div class="col-md-12" >
		<center><img src="IMAGENS\logo.png"></center>
          
 </div>
   <div class="col-xs-offset-11"><a href="boot.html" class="btn btn-danger" >Voltar</a></td></div>
 <table class="table ">
     <tr>
    	<td class="info" style="width:200px; text-align:center; font-weight:bold ">Nome</td>
		<td class="info" style="width:100px;text-align:center;font-weight:bold">Data Inicio </td>
		<td class="info" style="width:100px;text-align:center;font-weight:bold">Data Final</td>
		<td class="info" style="width:350px;text-align:center;font-weight:bold">Endereço</td>
		<td class="info" style="width:100px;text-align:center;font-weight:bold">CEP</td>
		<td class="info" style="width:200px;text-align:center;font-weight:bold">Localização</td>
        <td class="info" style="width:100px;text-align:center;font-weight:bold">Ação</td>
      </tr>
    </tbody>


	
    	<?php
	while($registro = pg_fetch_assoc($consulta)){
		?>
    
 <table class="table table-bordered"> 

	<td style="width:200px;"> <?= $registro["nome"]?>        </td>
	<td style="width:100px;"> <?= $registro["datainicio"]?>  </td>
	<td style="width:100px;"> <?= $registro["datafinal"]?>   </td>
	<td style="width:350px;"> <?= $registro["endereco"]?>    </td>
	<td style="width:100px;"> <?= $registro["cep"]?>         </td>
	<td style="width:200px;"> <?= $registro["localizacao"]?> </td>
    <td style="width:100px;"><a href="testebd.php?id=<?= $registro["idevento"]?>" class="btn btn-info">Cadastrar</a></td>
	</tr>
 	</table>
    
 <?php	} }?>
 
 
 
 

	</table>
	</div>
	 <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
</body>
</html>