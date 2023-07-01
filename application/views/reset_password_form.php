<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>

    <?php if (!empty(validation_errors())) : ?>
        <div class="error">
            <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?php echo form_open('account/update_password'); ?>
        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <div>
            <label for="password">New Password:</label>
            <input type="password" name="password" id="password">
        </div>

        <div>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password">
        </div>

        <div>
            <button type="submit">Reset Password</button>
        </div>
    <?php echo form_close(); ?>
</body>
</html>
