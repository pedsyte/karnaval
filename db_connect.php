
+28
-0

<?php
/**
 * Returns PDO database connection.
 * Chooses SQLite by default or MySQL if DB_TYPE=mysql is set.
 */
function getDbConnection(): PDO
{
    $dbType = getenv('DB_TYPE') ?: 'sqlite';

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    if ($dbType === 'mysql') {
        $host = getenv('DB_HOST') ?: 'localhost';
        $dbname = getenv('DB_NAME') ?: 'karnaval';
        $user = getenv('DB_USER') ?: 'root';
        $pass = getenv('DB_PASS') ?: '';
        $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";
        return new PDO($dsn, $user, $pass, $options);
    }

    // Default SQLite connection
    $path = __DIR__ . '/db/database.sqlite';
    return new PDO('sqlite:' . $path, null, null, $options);
}
