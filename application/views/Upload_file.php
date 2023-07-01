<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Form Upload</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    form {
      width: 300px;
      margin: 100px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-bottom: 20px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <form action="<?php echo base_url('upload/do_upload'); ?>" method="POST" enctype="multipart/form-data">
    <label for="nama_hafalan">Nama Hafalan:</label>
    <input type="text" name="nama_hafalan" required>

    <label for="audio">File Audio:</label>
    <input type="file" name="audio" accept="audio/*" required>

    <input type="submit" value="Upload">
  </form>
</body>
</html>
