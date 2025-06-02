FROM php:8.2-apache

# Instalar dependencias necesarias del sistema
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    curl \
    libc-client-dev \
    libssl-dev \
    libkrb5-dev \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap \
    && docker-php-ext-install pgsql pdo_pgsql \
    && docker-php-ext-enable imap

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar archivos del proyecto
COPY . /var/www/html/

# Cambiar permisos
RUN chown -R www-data:www-data /var/www/html

# Establecer directorio de trabajo y ejecutar Composer
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Exponer el puerto 80 para Apache
EXPOSE 80


