FROM php:7.4-apache

# Установка необходимых расширений PHP
RUN docker-php-ext-install pdo pdo_pgsql

# Копирование исходного кода в контейнер
COPY ./src /var/www/html

# Установка прав доступа
RUN chown -R www-data:www-data /var/www/html