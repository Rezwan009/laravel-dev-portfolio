FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev libonig-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy app files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Laravel cache cleanup
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear

# Expose port (optional but good practice)
EXPOSE 8000

# Start server
CMD php -S 0.0.0.0:$PORT -t public
