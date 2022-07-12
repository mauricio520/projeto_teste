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
}

function buscar($pdo)
{

    $sql = $pdo->prepare("SELECT * FROM cor WHERE cor_status = 1");
    $sql->execute();
    $data =  $sql->fetchAll();

    echo json_encode($data);
}

function excluir($pdo)
{

    $sql = $pdo->prepare("UPDATE cor SET cor_status = 0 WHERE cor_id = {$_POST['id_excluir']}");
    $sql->execute();
    echo json_encode('sucess');
}

function consulta($pdo)
{

    $sql = $pdo->prepare("SELECT * FROM cor WHERE cor_status = 1");
    $sql->execute();
    $data =  $sql->fetchAll();

    echo json_encode($data);
}

function editar($pdo)
{
    $cor_nome =  $_POST['cor_nome'];
    $sql = $pdo->prepare("UPDATE cor SET cor_nome  = '$cor_nome' WHERE cor_id = {$_POST['id_editar']}");

    $sql->execute();
    echo json_encode('sucess');
}

function adicionar($pdo)
{
    $cor_nome =  $_POST['cor_nome'];

    $sql = $pdo->prepare(" INSERT INTO cor (cor_nome,cor_status) VALUES ( '$cor_nome',1)");

    $sql->execute();
    echo json_encode('sucess');
}
