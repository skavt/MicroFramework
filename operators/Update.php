<?php

include '../view/Header.php';
require_once '../src/DB/UsersFromMySQL.php';


if (!isset($_GET['id'])) 
{
    include "../view/NotFound.php";
    exit;
}
$userId = $_GET['id'];

$user = getUserById($userId);
if (!$user) {
    include "../view/NotFound.php";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $user = array_merge($user, $_POST);
    $user = updateUser($_POST, $userId);
    
    header("Location: ../index.php");
}

include_once '../view/Form/RegForm.php';
?>

