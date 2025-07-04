<?php
/**
 * Archivo temporal para verificar variables de entorno
 * Este archivo debe eliminarse en producción
 */

echo "<h2>Debug - Variables de Entorno</h2>";
echo "<hr>";

echo "<h3>Variables de Base de Datos:</h3>";
echo "<strong>DB_HOST:</strong> " . (getenv('DB_HOST') ?: 'NO DEFINIDA') . "<br>";
echo "<strong>DB_PORT:</strong> " . (getenv('DB_PORT') ?: 'NO DEFINIDA') . "<br>";
echo "<strong>DB_NAME:</strong> " . (getenv('DB_NAME') ?: 'NO DEFINIDA') . "<br>";
echo "<strong>DB_USER:</strong> " . (getenv('DB_USER') ?: 'NO DEFINIDA') . "<br>";
echo "<strong>DB_PASSWORD:</strong> " . (getenv('DB_PASSWORD') ? '[CONFIGURADA]' : 'NO DEFINIDA') . "<br>";

echo "<hr>";
echo "<h3>Variables de Aplicación:</h3>";
echo "<strong>APP_ENV:</strong> " . (getenv('APP_ENV') ?: 'NO DEFINIDA') . "<br>";
echo "<strong>APP_DEBUG:</strong> " . (getenv('APP_DEBUG') ?: 'NO DEFINIDA') . "<br>";
echo "<strong>APP_NAME:</strong> " . (getenv('APP_NAME') ?: 'NO DEFINIDA') . "<br>";

echo "<hr>";
echo "<h3>Prueba de Conexión a Base de Datos:</h3>";

try {
    $host = getenv('DB_HOST');
    $port = getenv('DB_PORT');
    $dbname = getenv('DB_NAME');
    $username = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
    
    if (!$host || !$port || !$dbname || !$username || !$password) {
        throw new Exception("Variables de entorno de BD no están configuradas correctamente");
    }
    
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_TIMEOUT => 5 // timeout de 5 segundos
    ]);
    
    echo "<span style='color: green;'>✅ Conexión exitosa a la base de datos</span><br>";
    echo "<strong>Servidor:</strong> $host:$port<br>";
    echo "<strong>Base de datos:</strong> $dbname<br>";
    
    // Verificar algunas tablas
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "<br><strong>Tablas encontradas:</strong><br>";
    foreach ($tables as $table) {
        echo "- $table<br>";
    }
    
} catch (Exception $e) {
    echo "<span style='color: red;'>❌ Error de conexión: " . $e->getMessage() . "</span><br>";
    echo "<strong>Detalles del error:</strong><br>";
    echo "Host: " . ($host ?? 'NO DEFINIDO') . "<br>";
    echo "Puerto: " . ($port ?? 'NO DEFINIDO') . "<br>";
    echo "Base de datos: " . ($dbname ?? 'NO DEFINIDO') . "<br>";
    echo "Usuario: " . ($username ?? 'NO DEFINIDO') . "<br>";
}

echo "<hr>";
echo "<h3>Todas las Variables de Entorno del Sistema:</h3>";
echo "<details>";
echo "<summary>Click para ver todas las variables</summary>";
echo "<pre>";
print_r($_ENV);
echo "</pre>";
echo "</details>";

echo "<hr>";
echo "<p><strong>Nota:</strong> Este archivo es solo para debug. Elimínalo en producción.</p>";
?>
