<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

<?php 
// Inicia sessões 
session_start(); 

// Verifica se existe os dados da sessão de login 
if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) 
{ 
// Usuário não logado! Redireciona para a página de login 
header("Location: boot.html"); 
exit; 
} 
?> 
</body>
</html>