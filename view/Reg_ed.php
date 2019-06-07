<div class="container">
    <table class="table">
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td>
                    <a href="view/form/LoginForm.php?id=<?php echo $user['id'] ?>" class="btn btn-outline-success">Login</a>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
</div>