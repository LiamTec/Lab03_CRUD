# Usa la imagen oficial de PHP 8.2 con Apache
FROM php:8.2-apache

# Instala extensiones necesarias para Laravel y MySQL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copia el código de la aplicación
COPY . /var/www/html

# Da permisos correctos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Habilita mod_rewrite de Apache
RUN a2enmod rewrite

# Configura Apache para Laravel
COPY ./docker/apache/laravel.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

# Instala dependencias de Laravel
RUN composer install --no-interaction --optimize-autoloader

EXPOSE 80
