<?php
//conexao com o banco de dados
$conexao = mysqli_connect("localhost", "root","","gerenciador");

//verifica a conexao com o banco de dados
if ($conexao==false) {
  echo "Problemas ao conectar com o Banco de Dados";
  exit;
}
?>