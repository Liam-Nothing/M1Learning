# Use an official PHP image as a parent image
FROM php:8.2-fpm

# Set working directory within the container
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_mysql zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the Symfony application files into the container
COPY ./iutBlog /var/www/html

# Install Symfony dependencies
RUN composer install --no-scripts --no-autoloader

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]

# You may also need to configure your web server (e.g., Nginx or Apache) and expose the appropriate ports
