<?php
require_once __DIR__ . '/../db_connect.php';

try {
    $pdo = getDbConnection();
    $schema = file_get_contents(__DIR__ . '/schema.sql');
    $schema = preg_replace('/--.*\n/', '', $schema);
    $statements = array_filter(array_map('trim', explode(';', $schema)));
    foreach ($statements as $statement) {
        if ($statement !== '') {
            $pdo->exec($statement);
        }
    }
    echo "Database initialized successfully." . PHP_EOL;
} catch (PDOException $e) {
    fwrite(STDERR, "Database initialization failed: " . $e->getMessage() . PHP_EOL);
    exit(1);
}
