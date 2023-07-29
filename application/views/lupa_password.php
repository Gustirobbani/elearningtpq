<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
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
            padding: 70px;
            border: 1px solid #28a745; /* Ubah warna border menjadi hijau (#28a745) */
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

        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #28a745; /* Ubah warna border menjadi hijau (#28a745) */
            border-radius: 3px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px 30px; /* Ubah padding menjadi 10px atas-bawah dan 30px kiri-kanan */
            background-color: #28a745; /* Ubah warna background tombol menjadi hijau (#28a745) */
            color: #fff; /* Ubah warna teks tombol menjadi putih */
            border: none;
            border-radius: 3px; /* Ubah border-radius menjadi 3px */
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1f7d39; /* Ubah warna background tombol saat hover menjadi hijau lebih gelap (#1f7d39) */
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Lupa Password</h2>
        <?php if (isset($error)) echo '<p style="color: red;">' . $error . '</p>'; ?>
        <?php if (isset($message)) echo '<p style="color: green;">' . $message . '</p>'; ?>
        <form action="<?php echo base_url('account/reset_password'); ?>" method="post">
            <input type="email" name="email" placeholder="Enter your email">
            <input type="submit" value="Reset Password">
        </form>
    </div>
</body>
</html>
