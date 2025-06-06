# Use official PHP image with FPM
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    nginx

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . .

# Install dependencies
RUN composer install --optimize-autoloader --no-dev

# Copy nginx config
COPY docker/nginx.conf /etc/nginx/sites-available/default

# Copy .env.production to .env
RUN cp .env.production .env

# Generate application key
RUN php artisan key:generate

# Optimize Laravel
RUN php artisan optimize:clear
RUN php artisan optimize

# Expose port 8000 and start php-fpm server
EXPOSE 8000

# Start services
CMD bash -c "php-fpm & nginx -g 'daemon off;'"