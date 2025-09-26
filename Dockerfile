# Use Bitnami's official Laravel image (we'll assume Laravel 11)
FROM bitnami/laravel:11

# Copy the application code to the container's working directory
# The Bitnami image uses /app as its working directory
COPY . /app

# The Bitnami image already includes Composer, so we just install dependencies.
# Using --ignore-platform-reqs can help avoid issues with PHP version mismatches between your local env and the image.
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Set the correct permissions for the storage and bootstrap/cache directories
# The user in the Bitnami image is 'bitnami' and the group is 'daemon'.
RUN chown -R bitnami:daemon /app/storage /app/bootstrap/cache && \
    chmod -R 775 /app/storage /app/bootstrap/cache