<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("<?php echo base_url("assets/img/masjid.jpg"); ?>");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            padding: 80px;
            border: 1px solid #28a745;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            margin-bottom: 10px;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #28a745;
            border-radius: 3px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px 30px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1f7d39;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Password</h2>
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if (isset($token)): ?>
            <form action="<?php echo base_url('account/reset_password_submit'); ?>" method="post">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <label for="new_password">Tambahkan password baru di sini:</label>
                <input type="password" name="new_password" required>
                <br>
                <input type="submit" value="Reset Password">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
