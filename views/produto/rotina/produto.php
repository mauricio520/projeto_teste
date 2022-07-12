<?php


define('HOST', 'localhost');
define('DATABASE', 'projeto_php');
define('USER', 'root');
define('PASSWORD', '');

try {
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo 'Erro ao Conectar - Tente Mais Tarde';
}

$action   = $_POST['action'];

switch ($action) {
    case 'buscar':
        buscar($pdo);
        break;

    case 'excluir':
        excluir($pdo);
        break;

    case 'consulta':
        consulta($pdo);
        break;

    case 'editar':
        editar($pdo);
        break;

    case 'adicionar':
        adicionar($pdo);
        break;

    case 'buscar_cor':
        buscar_cor($pdo);
        break;
}

function buscar($pdo)
{

    $sql = $pdo->prepare("SELECT A.*,B.*FROM produto A LEFT JOIN preco B ON A.id_prod = B.id_preco WHERE A.status_prod = 1");
    $sql->execute();
    $data =  $sql->fetchAll();

    echo json_encode($data);
}

function excluir($pdo)
{

    $sql = $pdo->prepare("UPDATE produto SET status_prod = 0 WHERE id_prod = {$_POST['id_excluir']}");
    $sql->execute();
    echo json_encode('sucess');
}

function consulta($pdo)
{

    $sql = $pdo->prepare("SELECT A.*,B.*FROM produto A LEFT JOIN preco B ON A.id_prod = B.id_preco WHERE  id_prod = {$_POST['id_consultar']} AND A.status_prod = 1");
    $sql->execute();
    $data =  $sql->fetchAll();

    echo json_encode($data);
}

function editar($pdo)
{

    $sql = $pdo->prepare("UPDATE produto SET nome_prod = '{$_POST['nome_prod']}' WHERE id_prod = {$_POST['id_editar']}");
    $sql->execute();
    $sql = $pdo->prepare("UPDATE preco SET preco = '{$_POST['preco']}' WHERE id_preco = {$_POST['id_editar']}");
    $sql->execute();
    echo json_encode('sucess');
}

function adicionar($pdo)
{
    $nome_prod = $_POST['nome_prod'];
    $cor_prod = $_POST['cor_prod'];
    $preco = $_POST['preco'];

    $sql = $pdo->prepare(" INSERT INTO produto (nome_prod,cor_prod,status_prod)VALUES ('$nome_prod','$cor_prod',1)");
    $sql->execute();
    $sql = $pdo->prepare(" INSERT INTO preco (preco)VALUES ($preco)");
    $sql->execute();
    echo json_encode('sucess');
}


function buscar_cor($pdo)
{

    $sql = $pdo->prepare("SELECT * FROM cor ");
    $sql->execute();
    $data =  $sql->fetchAll();

    echo json_encode($data);
}
