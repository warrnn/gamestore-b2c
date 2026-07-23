FROM dunglas/frankenphp

# Specify main directory
WORKDIR /app

# Copy Composer from the official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP Extension using FrankenPHP Helper
RUN install-php-extensions pdo_pgsql pgsql zip 