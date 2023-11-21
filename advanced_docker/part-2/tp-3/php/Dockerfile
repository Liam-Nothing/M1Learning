FROM php:7.4-apache
COPY ./index.php /var/www/html/index.php
RUN docker-php-ext-install pdo pdo_mysql
EXPOSE 80
CMD ["apache2-foreground"]
