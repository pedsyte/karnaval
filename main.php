<?php
require_once __DIR__ . '/db_connect.php';

/**

 * Retrieve categories with their products and components.

 */
function fetchCategories(): array
{
    $pdo = getDbConnection();


    $categories = $pdo->query('SELECT id, name, image_path FROM categories')->fetchAll();

    $productStmt = $pdo->prepare('SELECT id, name, price, description, image_path FROM products WHERE category_id = ?');
    $componentStmt = $pdo->prepare('SELECT component_name FROM product_components WHERE product_id = ?');

    foreach ($categories as &$category) {
        $productStmt->execute([$category['id']]);
        $products = $productStmt->fetchAll();
        foreach ($products as &$product) {
            $componentStmt->execute([$product['id']]);
            $product['components'] = $componentStmt->fetchAll(PDO::FETCH_COLUMN);
        }
        $category['products'] = $products;
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

