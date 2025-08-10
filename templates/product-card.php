<div class="product">
  <a href="#"><img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name']) ?>"></a>
  <h3><?= htmlspecialchars($product['name']) ?></h3>
  <?php if (!empty($product['description'])): ?>
    <p><?= htmlspecialchars($product['description']) ?></p>
  <?php endif; ?>
  <?php if (!empty($product['components'])): ?>
    <ul class="components">
      <?php foreach ($product['components'] as $component): ?>
        <li><?= htmlspecialchars($component) ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <a href="#" class="details-link">подробнее</a>
  <div class="price-container">
    <p class="price"><strong><?= htmlspecialchars($product['price']) ?> грн.</strong></p>
    <button>Добавить в корзину</button>
  </div>
</div>
