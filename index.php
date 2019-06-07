<?php

use src\HttpUtils\Request;
use src\HttpUtils\Response;
use src\Service\Router;

require_once __DIR__ . '/src/DB/UsersFromMySQL.php';
require_once __DIR__ . '/src/DB/Database.php';

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});

$db = new Database();
$mysqli = $db->getConnection(); 


$users = getUsers();
$router = new Router(new Request);
$router->get('/view', 'Main');

include_once 'view/Reg_ed.php';
include_once 'src/DB/Migrations.php';
?>