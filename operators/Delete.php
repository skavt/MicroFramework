<?php

include '../view/Header.php';
require_once '../src/DB/Database.php';
require_once '../src/DB/UsersFromMySQL.php';

$userId = $_POST['id'];
deleteUser($userId);

$userId = $_GET['id'];
$user = getUserById($userId);

function deleteUser ($userId)
{
    openConnection();
    global $mysqlConnection;
    mysqli_query($mysqlConnection, "DELETE FROM users WHERE id=$userId");
    closeConnection();

}
deleteUser($userId);

header("Location: ../index.php");
