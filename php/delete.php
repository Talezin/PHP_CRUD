<?php

//conecta ao banco de dados
include 'connect.php';

//Atribui a variavel codigo do input recebido do formulario
  $codigo=$_POST[('codigo')];  

  //delete na tabela transportadoras onde o codigo é igual codigo
  $sql="DELETE from transportadoras where  codigo= $codigo";
  
  //verifica se excluiu
$resultado = mysqli_query($conexao,$sql);
  if($resultado==true)
      echo "<script> window.alert('Registro excluido');
              window.location.href = '../delete.html';
              </script>";
    else
      echo "<script> window.alert('Registro não excluido');
              window.location.href = '../delete.html';
              </script>";
?>
