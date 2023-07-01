<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hafalan Santri</title>
  <style>
   /* Gaya umum */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
}

h1 {
  text-align: center;
}

h3 {
  margin-top: 20px;
}

p {
  margin: 0;
}

.text-center {
  text-align: center;
}

/* Tampilan video */
video {
  width: 100%;
}

/* Tampilan komentar */
hr {
  border: none;
  border-top: 1px solid #ccc;
  margin: 10px 0;
}

textarea {
  width: 100%;
  height: 100px;
  resize: vertical;
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

form {
  margin-top: 10px;
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
  <?php } ?>

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
