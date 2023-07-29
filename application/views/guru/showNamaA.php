<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hafalan Santri - List Nama Kelas A</title>
  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-image: url("<?php echo base_url('assets/img/ani.jpg'); ?>");
      background-size: cover;
      background-position: center;
    }

    h1 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    /* Link Styles */
    a {
      text-decoration: none;
      color: #007bff;
    }

    /* Link Hover Styles */
    a:hover {
      color: #0056b3;
    }
  </style>
</head>
<body>
<h1>Hafalan Santri - List Hafalan</h1>

<!-- Tampilkan daftar nama siswa -->
<?php if (!empty($uploads)): ?>
  <table>
    <tr>
      <th>No</th>
      <th><strong>Nama Santri</strong></th>
      <th><strong>Video Hafalan</strong></th>
    </tr>
    <?php $i = 1; foreach ($uploads as $row): ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td>
            <strong><?php echo $row['nama']; ?></strong>
          </a>
        </td>
        <td>
          <a href="<?php echo base_url('guru/showVideoA/'.$row['nama']); ?>">
					<button style="padding: 10px 20px; font-size: 16px; background-color: green; color: white; border: none; cursor: pointer;">video</button>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>
</body>
</html>
