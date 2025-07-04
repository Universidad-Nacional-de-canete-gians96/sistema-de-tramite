#!/bin/bash

# Crear directorios y asignar permisos
mkdir -p /var/www/html/controller/{tramite,tramite_area}/documentos /var/www/html/controller/persona/FOTO
chown -R www-data:www-data /var/www/html/controller
chmod -R 755 /var/www/html/controller

# Iniciar Apache
apache2-foreground
