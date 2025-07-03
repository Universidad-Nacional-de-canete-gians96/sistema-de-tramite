FROM php:8.3-apache

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql zip

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Configurar directorio raíz de Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copiar todos los archivos del proyecto al contenedor
COPY . /var/www/html/

# Crear directorios para subida de archivos y asignar permisos
RUN mkdir -p /var/www/html/controller/tramite/documentos \
    && mkdir -p /var/www/html/controller/tramite_area/documentos \
    && mkdir -p /var/www/html/controller/persona/FOTO \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader

# Hacer ejecutable el script de entrada
RUN chmod +x /var/www/html/docker-entrypoint.sh

# Puerto expuesto
EXPOSE 80

# Comando para iniciar el servidor con nuestro script
CMD ["/var/www/html/docker-entrypoint.sh"]
