<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
	
	
	<?php
//Faz a conexão om o banco
$link = pg_connect('host=localhost port=5432 dbname=laiza user=postgres password=123');
if (!$link) {
      die("Não foi possível abrir conexão com PGSQL");
}else{
		
	 //criando a query de consulta à tabela criada 
	$sql = "SELECT nome,datainicio,datafinal,endereco,cep,localizacao FROM evento";
	
		
		//pecorrendo os registros da consulta.
		//while($aux = pg_fetch_assoc($sql)) { 
			//; echo "nome:".$aux["nome"]."
//"; echo "datainicio:".$aux["datainicio"]."
//"; echo "datafinal:".$aux["datafinal"]."
//"; echo "endereco:".$aux["endereco"]."
//"; echo "cep:".$aux["cep"]."
//"; echo "localizacao:".$aux["localizacao"]."
//";
//$aux = $_POST['nome'];
//$aux = $_POST['datainicio'];
//$aux = $_POST['datafinal'];
//$aux = $_POST['endereco'];
//$aux = $_POST['cep'];
//$aux = $_POST['localizacao'];

			$consulta = pg_query($sql);

	
	
	// Armazena os dados da consulta em um array associativo

	while($registro = pg_fetch_assoc($consulta)){
		
		?>
<div class="form-group">
	<? echo '<tr>';

	echo '<td>'.$registro["nome"].'</td>';
	echo '<td>'.$registro["datainicio"].'</td>';
	echo '<td>'.$registro["datafinal"].'</td>';
	echo '<td>'.$registro["endereco"].'</td>';
	echo '<td>'.$registro["cep"].'</td>';
	echo '<td>'.$registro["localizacao"].'</td>';

	echo '</tr>'; ?>
		
		
		div class="form-group">
    <label for="datainicio" class="col-sm-2 control-label">Data Inicio</label>
    <div class="col-sm-10">
      <input type="datainicio" class="form-control" id="datainicio" placeholder="datainicio">
    </div>
  </div>
					<div class="form-group">
    <label for="datafinal" class="col-sm-2 control-label">Data Final</label>
    <div class="col-sm-10">
      <input type="datafinal" class="form-control" id="datafinal" placeholder="datafinal">
    </div>
  </div>
					
						<div class="form-group">
    <label for="endereço" class="col-sm-2 control-label">Endereço</label>
    <div class="col-sm-10">
      <input type="endereço" class="form-control" id="endereço" placeholder="endereço">
    </div>
  </div>			
					
						<div class="form-group">
    <label for="cep" class="col-sm-2 control-label">Cep</label>
    <div class="col-sm-10">
      <input type="cep" class="form-control" id="cep" placeholder="cep">
    </div>
  </div>			
					
						<div class="form-group">
    <label for="localização" class="col-sm-2 control-label">Localização</label>
    <div class="col-sm-10">
      <input type="localização" class="form-control" id="localização" placeholder="localização">
    </div>
  </div>				
					
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Me lembre
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
	
		
		

	}

	echo '</table>';

	}

	 
	
											


?>

</body>
</html>