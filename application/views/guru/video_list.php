<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hafalan Santri</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('<?php echo base_url("assets/img/quran.jpg"); ?>');
      background-size: cover;
      background-repeat: no-repeat;
      margin: 0;
      padding: 0;
      background-color: rgba(0, 0, 0, 0.0); /* Ubah tingkat transparansi di sini (0.5) */
    }

    h1 {
      text-align: center;
      padding: 20px;
      color: #ffffff; /* Ubah warna teks menjadi putih */
    }

    .text-center {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      margin-bottom: 1%;
      background-color: rgba(255, 255, 255, 0.0); /* Ubah tingkat transparansi di sini (0.8) */
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .text-center th {
      padding: 20px;
      text-align: center;
      color: #ffffff; /* Ubah warna teks menjadi putih */
    }

    audio {
      margin-bottom: 5px;
      width: 85%;
    }

    p {
      text-align: center;
      color: #ffffff; /* Ubah warna teks menjadi putih */
    }
  </style>
</head>
<body>
  <h1>Hafalan Santri</h1>

  <?php foreach ($video as $u) { ?>
    <div class="text-center">
      <th scope="row">
        <p><?php echo $u->nama_hafalan ?></p>
      </th>
      <td>
        <video controls>
          <source type="video/mp4" src="<?= base_url('assets/video/' . $u->file_name); ?>" />
          Browser Anda tidak mendukung pemutaran video.
        </video>
      </td>
    </div>
		<h3>Comments</h3>
<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
        <p><?php echo $comment['comment']; ?></p>
        <p>Posted at: <?php echo $comment['created_at']; ?></p>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <p>No comments available.</p>
<?php endif; ?>

<!-- Form untuk menambahkan komentar -->
<h3>Add Comment</h3>
<form action="<?php echo site_url('guru/addComment'); ?>" method="post">
    <input type="hidden" name="classId" value="<?php echo isset($classId) ? $classId : ''; ?>">
    <textarea name="comment" placeholder="Type your comment here"></textarea>
    <br>
    <button type="submit" name="submit">Submit</button>
</form>

<?php if (!empty($submittedComment)): ?>
    <h3>Submitted Comment</h3>
    <p><?php echo $submittedComment['comment']; ?></p>
    <p>Posted at: <?php echo $submittedComment['created_at']; ?></p>
    <hr>
<?php endif; ?>
</body>
</html>
