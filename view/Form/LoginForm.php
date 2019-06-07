<?php

include_once '../Header.php';
require_once '../../src/DB/UsersFromMySQL.php';

$userId = $_GET['id'];
$user = getUserById($userId);

if (!isset($_GET['id'])) {
    include "../NotFound.php";
    exit;
}

?>
<div class="container" style='text-align: center'>
        <div class="card-body">
            <form style="display: inline-block" method="POST" action="submit.php">
                <input name="name" value="<?php echo $user['name'] ?>">
                <input type="password" name="password" value="<?php echo $data['password'] ?>">
                <a href="Submit.php?id=<?php echo $user['id'] ?>" class="btn btn-secondary">Login</a>
            </form>
    </div>
</div>           
        
