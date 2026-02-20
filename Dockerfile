FROM php:8.4-apache

WORKDIR /var/www/html

RUN a2enmod rewrite
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl gd zip mysqli pdo pdo_mysql \
    && a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/目录!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf


RUN chown -R www-data:www-data /var/www/html

CMD ["bash", "-c", "composer install && chown -R www-data:www-data /var/www/html/writable && chmod -R 775 /var/www/html/writable && apache2-foreground"]