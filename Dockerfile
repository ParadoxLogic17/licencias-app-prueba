# Use a PHP 8.2 image with FPM and Nginx
FROM richarvey/nginx-php-fpm:2.3.0

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html

# Copy Nginx config for Laravel
COPY .deploy/nginx.conf /etc/nginx/sites-enabled/default

# Set permissions for Nginx
RUN chown -R www-data:www-data /var/www/html/public

# Install PHP dependencies
RUN composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader

# Generate Laravel application key
RUN php artisan key:generate

# Run database migrations
RUN php artisan migrate --force

# Set permissions for storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80

# Start script will handle starting php-fpm and nginx
CMD ["/start.sh"]
