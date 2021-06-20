<?php
// carregando database
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

// obtendo a variável id via GET 
$id = filter_input(INPUT_GET,'id');

//se foi enviado algum dado para ID
if($id){
   $usuarioDao->delete($id);
    
}

header('Location: index.php');
exit;

