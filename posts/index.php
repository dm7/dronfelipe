<?php include '../__partials/header.html'; ?>

<?php include '../__partials/navbar-left.html'; ?>
<?php include '../__partials/navbar-right.html'; ?>

<?php

include_once 'models/Post.php';

parse_str($_SERVER['QUERY_STRING']);

$query = "SELECT
  id, DATE_FORMAT(written, '%b %d, %Y') AS written, slug, name, description, content, DATE_FORMAT(created, '%b %d, %Y') AS created, DATE_FORMAT(updated, '%b %d, %Y') AS updated
  FROM post
  WHERE slug = ?";

$post = $db->rawQueryOne($query, Array($p));

if(!isset($post)) {
  include "404.php";
} else {
?> <article> <?php
  echo $post['content'];
?>
    <footer>
      <p><b>
        Written on <?= $post['written'] ?><br>
        Last updated on <?= $post['updated'] ?>
      </b></p>
    </footer>
  </article>
<?php } ?>

<script src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=AM_HTMLorMML-full"></script>


</body>
</html>

