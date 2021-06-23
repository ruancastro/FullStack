<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$usertest = new Usuario();

$id= filter_input(INPUT_POST,'id');
$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);

if($id && $name && $email){
  
if($usuarioDao->findByEmail($email) === false){
   $usuario = new Usuario();
   $usuario->setId($id);
   $usuario->setNome($name);
   $usuario->setEmail($email);

   $usuarioDao->update($usuario);

   header("Location: index.php");
   exit; 
} else {
   header("Location: editar.php?id=".$id);
}
  
   }  else {
   header("Location: editar.php?id=".$id);
}