<?php
require_once __DIR__ . '/db_connect.php';
$pdo = getDbConnection();
$categories = $pdo->query('SELECT name, image_path FROM categories')->fetchAll();
?>
<nav>
  <ul>
    <?php foreach ($categories as $cat): ?>
      <li><a href="#"><img src="<?= htmlspecialchars($cat['image_path']) ?>" alt="<?= htmlspecialchars($cat['name']) ?>" width="100"><span><?= htmlspecialchars($cat['name']) ?></span></a></li>
    <?php endforeach; ?>
  </ul>
</nav>
