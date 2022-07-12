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
}

function buscar($pdo)
{

    $where = '';

    if(!empty($_POST['filter_nome'])){
        $where.= "AND A.nome_prod LIKE '%{$_POST['filter_nome']}%'";
    }
    

    $sql = $pdo->prepare("SELECT A.*,B.*FROM produto A LEFT JOIN preco B ON A.id_prod = B.id_preco WHERE  A.status_prod = 1 $where");
    $sql->execute();
    $data =  $sql->fetchAll();

    echo json_encode($data);
}
