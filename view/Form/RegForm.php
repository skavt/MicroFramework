<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo isset($user['id']) ? $user['id'] : '' ?>">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" class="form-control"
                    value="<?php echo isset($user['name']) ? $user['name'] : '' ?>">
                </div>
                <p> <?php if (!empty($emptyName)) { echo $emptyName; } ?> </p>
                <p> <?php if (!empty($errorName) && empty($emptyName)) { echo $errorName; } ?> </p>

                <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control"
                    value="<?php echo isset($user['username']) ? $user['username'] : '' ?>">
                </div>
                <p> <?php if (!empty($emptyUsername)) { echo $emptyUsername; } ?> </p>
                <p> <?php if (!empty($errorUsername) && empty($emptyUsername)) { echo $errorUsername; } ?> </p>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control"
                    value="<?php echo isset($data['password']) ? $data['password'] : '' ?>">
                </div>
                <p> <?php if (!empty($emptyPassword)) { echo $emptyPassword; } ?> </p>
                <p> <?php if (!empty($errorPassword) && empty($emptyPassword)) { echo $errorPassword; } ?> </p>

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control"
                    value="<?php echo isset($user['email']) ? $user['email'] : '' ?>">
                </div>
                <p> <?php if (!empty($emptyEmail)) { echo $emptyEmail; } ?> </p>
                <p> <?php if (!empty($errorEmail) && empty($emptyEmail)) { echo $errorEmail; } ?> </p>

                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" class="form-control"
                    value="<?php echo isset($user['phone']) ? $user['phone'] : '' ?>">
                </div>
                <p> <?php if (!empty($emptyPhone)) { echo $emptyPhone; } ?> </p>
                <p> <?php if (!empty($errorPhone) && empty($emptyPhone)) { echo $errorPhone; } ?> </p>

                <div class="form-group">
                    <label>Website</label>
                    <input name="website" class="form-control"
                    value="<?php echo isset($user['website']) ? $user['website'] : '' ?>">
                </div>
                <p> <?php if (!empty($emptyWebsite)) { echo $emptyWebsite; } ?> </p>
                <p> <?php if (!empty($errorWebsite) && empty($emptyWebsite)) { echo $errorWebsite; } ?> </p>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>