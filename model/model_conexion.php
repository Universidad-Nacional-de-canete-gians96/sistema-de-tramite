<?php

//Clase para la conexión a la base de datos con PDO
//Encapsula la conexión en un clase reutilizable, para no escribir la conexion en cada archivo donde lo necesitemos
class conexionBD{

    private $pdo; //variable para almacenar la conexión

    //Función o método para conectarse a la base de datos con PDO
    public function conexionPDO(){

        // Cargar variables del archivo .env si existe
        $this->loadEnv();

        // Configuración usando variables de entorno o valores por defecto
        $host = getenv('DB_HOST') ?: 'db';
        $port = getenv('DB_PORT') ?: '3306';
        $db = getenv('DB_NAME') ?: 'sis_tramite';
        $user = getenv('DB_USER') ?: 'admin';
        $password = getenv('DB_PASSWORD') ?: 'admin';
        
        try{ //Manejo de excepciones

            //Crear la conexion con PDO incluyendo el puerto
            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db",$user,$password);

            //Configurar el manejo de errores con PDO
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Establecer el conjunto de caracteres UTF8
            $pdo->exec('set names UTF8');
            return $pdo; // Retorna la conexión para ser usada en otras partes del sistema

        }catch(PDOException $e){
            echo 'Error al conectarse a la base de datos '.$e->getMessage();
        }
    }
    
    //Función privada para cargar variables del archivo .env
    private function loadEnv(){
        $envFile = __DIR__ . '/../.env';
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) {
                    continue; // Saltar comentarios
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
    
    //Función para cerrar la conexión a la base de datos
    function cerrar_conexion(){
        $this->pdo = null; //Se cierra la conexión al asignarle null 
    }

}

?>