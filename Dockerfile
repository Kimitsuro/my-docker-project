FROM php:7.4-apache

# Установка необходимых расширений PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Копирование исходного кода в контейнер
COPY ./src /var/www/html

# Установка прав доступа
RUN chown -R www-data:www-data /var/www/html