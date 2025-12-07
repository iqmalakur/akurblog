# =====================
# 1. Build frontend (Vite)
# =====================
FROM node:20-alpine AS vite

WORKDIR /app

COPY package.json package-lock.json* yarn.lock* ./
RUN npm install

COPY resources resources
COPY vite.config.js .
RUN npm run build


# =====================
# 2. Install PHP dependencies (Composer)
# =====================
FROM composer:2.3 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --prefer-dist \
    --no-scripts \
    --no-interaction


# =====================
# 3. Runtime (PHP + Nginx)
# =====================
FROM php:8.3.6-fpm-alpine

RUN apk add --no-cache \
    nginx \
    supervisor \
    bash \
    libzip-dev \
    zip \
    unzip \
 && docker-php-ext-install pdo pdo_mysql zip

WORKDIR /var/www/html

# Copy app source
COPY . .

# Copy vendor
COPY --from=vendor /app/vendor vendor

# Copy Vite build
COPY --from=vite /app/public/build public/build

# Copy configs
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisord.conf

# Permission Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
