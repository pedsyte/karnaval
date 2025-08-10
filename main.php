<?php
require_once __DIR__ . '/db_connect.php';

/**
 * Retrieve categories with their products.
 */
function fetchCategories(): array
{
    $pdo = getDbConnection();

    $categories = $pdo->query('SELECT id, name FROM categories')->fetchAll();

    $productStmt = $pdo->prepare('SELECT id, name, price, description FROM products WHERE category_id = ?');

    foreach ($categories as &$category) {
        $productStmt->execute([$category['id']]);
        $category['products'] = $productStmt->fetchAll();
    }

    return $categories;
}

$categories = fetchCategories();
$ajax = isset($_GET['ajax']);

if (!$ajax) {
    echo '<main id="product-container">';
}

foreach ($categories as $cat) {
    echo '<h2>' . htmlspecialchars($cat['name']) . '</h2>';
    echo '<div class="pizza"><div class="products-grid">';
    foreach ($cat['products'] as $product) {
        // Make $product available to template
        include __DIR__ . '/templates/product-card.php';
    }
    echo '</div></div>';
}

if (!$ajax) {
    echo '</main>';
}

