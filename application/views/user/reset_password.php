<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <?php echo form_open('user/reset_password'); ?>
        <label for="new_password">New Password</label>
        <input type="password" name="new_password" required><br><br>
        
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" required><br><br>
        
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
        
        <input type="submit" value="Reset Password">
    <?php echo form_close(); ?>
</body>
</html>
