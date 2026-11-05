FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    zip \
    unzip \
    git

RUN docker-php-ext-install pdo pdo_sqlite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader

EXPOSE 10000

CMD mkdir -p database storage/framework/sessions storage/framework/views storage/framework/cache && \
    touch database/database.sqlite && \
    chmod -R 777 database storage bootstrap/cache && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=10000