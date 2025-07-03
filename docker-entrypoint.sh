#!/bin/bash

# Usar configuración Docker si las variables de entorno están presentes
if [ -n "$DB_HOST" ]; then
  cp /var/www/html/model/model_conexion_docker.php /var/www/html/model/model_conexion.php
fi

# Crear directorios y asignar permisos
mkdir -p /var/www/html/controller/{tramite,tramite_area}/documentos /var/www/html/controller/persona/FOTO
chown -R www-data:www-data /var/www/html/controller
chmod -R 755 /var/www/html/controller

# Iniciar Apache
apache2-foreground
