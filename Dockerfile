# Usa una imagen oficial de PHP con Apache
FROM php:8.3.16-apache

# Configurar la zona horaria a "America/Lima"
RUN ln -sf /usr/share/zoneinfo/America/Lima /etc/localtime && \
    echo "America/Lima" > /etc/timezone

# Instalar dependencias del sistema y extensiones PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql zip mysqli

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar todos los archivos del proyecto al contenedor
COPY . /var/www/html/

# Instalar dependencias de Composer
RUN composer install --no-interaction --optimize-autoloader

# Crear directorios para archivos subidos y asignar permisos
RUN mkdir -p /var/www/html/controller/tramite/documentos \
    && mkdir -p /var/www/html/controller/tramite_area/documentos \
    && mkdir -p /var/www/html/controller/persona/FOTO \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Hacer ejecutable el script de entrada
RUN chmod +x /var/www/html/docker-entrypoint.sh

# Puerto expuesto
EXPOSE 80

# Usar nuestro script de entrada personalizado
CMD ["/var/www/html/docker-entrypoint.sh"]
