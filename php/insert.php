<?php

//conecta ao banco de dados
include 'connect.php';

//atribui as variaveis o dados recebidos do formulario
  $razaoSocial=$_POST['razaoSocial'];
  $estadoTransp=$_POST['estadoTransp'];
  $nomeFantasia=$_POST['nomeFantasia'];
  $cnpjTransp=$_POST['cnpjTransp'];
  $apoliceTransp=$_POST['apoliceTransp'];

//verifica se algum dado esta vazio
  if ($razaoSocial == null || $estadoTransp == null || $nomeFantasia == null || $cnpjTransp == null || $apoliceTransp == null) {
    echo "<script> window.alert('Favor informar todos os dados');
              window.location.href = '../insert.html';
              </script>";
  }
//verifica se cnpj é apenas numero
  elseif (!is_numeric($cnpjTransp)) {
    echo "<script> window.alert('Favor informar um CNPJ valido');
              window.location.href = '../insert.html';
              </script>" ;
  }
//verifica se a apolice é apenas numero
  elseif (!is_numeric($apoliceTransp)) {
    echo "<script> window.alert('Favor informar uma apólice valida');
              window.location.href = '../insert.html';
              </script>";
  }
//verifica se o estado é apenas sigla
  elseif (strlen($estadoTransp) != 2) {
    echo "<script> window.alert('informar apenas a sigla do estado');
              window.location.href = '../insert.html';
              </script>";
  }
  //verifica se o cnpj esta no tamanho correto
  elseif (strlen($cnpjTransp) != 14) {
    echo "<script> window.alert('CNPJ esta incompleto');
              window.location.href = '../insert.html';
              </script>";
  }else{


//transforma o estado em maiuscula 
  $estadoTransp = strtoupper($estadoTransp);

//converte o cnpj em formato correto com "##.###.###/####-##"
  $cnpj_cpf = preg_replace("/\D/", '', $cnpjTransp);

  $cnpjCerto = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);

  //inseri no banco de dados
  $sql = "INSERT INTO transportadoras(codigo,razaoSocial,estadoTransp,nomeFantasia,cnpjTransp,apoliceTransp) VALUES(NULL,'$razaoSocial','$estadoTransp','$nomeFantasia','$cnpjCerto','$apoliceTransp')";


  $resultado = mysqli_query($conexao,$sql);




  if (!$resultado) {
    echo "<script> window.alert('Registro não inserido');
              window.location.href = '../insert.html';
              </script>";
  }
  else {
    echo "<script> window.alert('Registro inserido com sucesso');
              window.location.href = '../insert.html ';
              </script>";

  }
}
?> 
