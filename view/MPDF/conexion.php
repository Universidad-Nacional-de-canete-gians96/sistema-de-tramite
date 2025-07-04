<?php
// Importar la clase de conexión centralizada
require_once '../../model/model_conexion.php';

// Crear una instancia de la conexión PDO
$conexion = new conexionBD();
$pdo = $conexion->conexionPDO();

// Para mantener compatibilidad con códigos que esperan mysqli, 
// convertir PDO a mysqli usando las mismas credenciales de entorno
function loadEnv() {
    $envFile = __DIR__ . '/../../.env';
    if (file_exists($envFile)) {
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);
                if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                    putenv(sprintf('%s=%s', $name, $value));
                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                }
            }
        }
    }
}

// Cargar variables de entorno
loadEnv();

// Configuración usando variables de entorno o valores por defecto
$host = getenv('DB_HOST') ?: 'db';
$port = getenv('DB_PORT') ?: '3306';
$db = getenv('DB_NAME') ?: 'sis_tramite';
$user = getenv('DB_USER') ?: 'admin';
$password = getenv('DB_PASSWORD') ?: 'admin';

// Crear conexión mysqli para mantener compatibilidad con reportes existentes
$mysql = new mysqli($host, $user, $password, $db, $port);

// Verificar conexión
if ($mysql->connect_error) {
    die("Error de conexión: " . $mysql->connect_error);
}

// Establecer charset
$mysql->set_charset("utf8");
?>