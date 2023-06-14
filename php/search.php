<link rel="stylesheet" type="text/css" href="../css/search.css">
<div class="formulario">
<form method="POST" action="search.php">
        <input type="text" name="nomeFantasia" placeholder="Nome Fantasia">
            <h1>ou</h1>
            <select name="select">
                <option value="">Listar por...</option>
                <option value="codigo">Codigo</option>
                <option value="razaoSocial">Razão Social</option>
                <option value="nomeFantasia">Nome Fantasia</option>
                <option value="estadoTransp">Estado</option>
            </select>
            <input type="submit" name="Enviar">
</form>
</div>
<?php

//remover erros 
error_reporting(0);

//conecta ao banco de dados
include 'connect.php';

//verifica se a caixa de opção esta vazia ou o nome
if (empty($_POST['select'] || $_POST['nomeFantasia'] )) {
    echo"<h1 class='escolha'>Escolha alguma opção</h1>";
   }
//caso a option esteja vazia....
elseif (empty($_POST['select'])){

//atribui o nome 
$nome = $_POST['nomeFantasia'];

//select no banco de dados a variavel nome
$sql = "SELECT * from transportadoras where nomeFantasia  = '". $nome ."'";

$resultado = mysqli_query($conexao,$sql);

//cria a tabela e o cabeçalho
if (mysqli_num_rows($resultado) > 0) {
    echo "<div class='table-box'>
    <table class='tabela'>";
         echo "<tr class='cabecalho'>"
              ."<td>Codigo</td>"
              ."<td>Razão Social</td>"
              ."<td>Nome Fantasia</td>"
              ."<td>Estado</td>"
              ."<td>CNPJ</td>"
              ."<td>Apólice</td>"
              ."</tr>"; 
};

//cria uma linha para cada item que retorna da pesquisa do banco de dados
while ($row = mysqli_fetch_array($resultado)) {
    echo 
    "<tr class='conteudo'>"
    ."<td>$row[codigo]</td>"
    ."<td>$row[razaoSocial]</td>"
    ."<td>$row[nomeFantasia]</td>"
    ."<td>$row[estadoTransp]</td>"
    ."<td>$row[cnpjTransp]</td>"
    ."<td>$row[apoliceTransp]</td>"
    ."</tr>"
    ;
};

//verifica se o nome esta vazio
}elseif (empty($_POST['nomeFantasia'])){

//atribui a opção
$option = $_POST['select'];

//select no banco de dados de acordo com a opção
$sql="SELECT * FROM transportadoras ORDER BY $option";

$resultado = mysqli_query($conexao,$sql);

//cria a tabela e cabeçalho
if (mysqli_num_rows($resultado) > 0) {
    echo "<div class='table-box'>
    <table class='tabela'>";
         echo "<tr class='cabecalho'>"
              ."<td>Codigo</td>"
              ."<td>Razão Social</td>"
              ."<td>Nome Fantasia</td>"
              ."<td>Estado</td>"
              ."<td>CNPJ</td>"
              ."<td>Apólice</td>"
              ."</tr>"; 
};

//cria uma linha para cada item que retorna da pesquisa do banco de dados
while ($row = mysqli_fetch_array($resultado)) {
    echo 
    "<tr class='conteudo'>"
    ."<td>$row[codigo]</td>"
    ."<td>$row[razaoSocial]</td>"
    ."<td>$row[nomeFantasia]</td>"
    ."<td>$row[estadoTransp]</td>"
    ."<td>$row[cnpjTransp]</td>"
    ."<td>$row[apoliceTransp]</td>"
    ."</tr>"
    ;
};

//fecha a tabela
echo "</table> </div>";
};
?> 

