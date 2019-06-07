<?php 

require_once __DIR__ . '/../src/DB/UsersFromMySQL.php';

$users = getUsers();

?>
{header}

<div>
    <h1 style='text-align: center'>My First App</h1>
    <p style='text-align: center'>Please Log in or Sign up</p>
    <h2 style="margin-left: 125px">Registered users</h2>
</div>


