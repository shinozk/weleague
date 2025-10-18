FROM php:8.4-fpm
RUN apt-get update \
    && apt-get install -qq -y --no-install-recommends \
    zlib1g-dev \
    zip \
    unzip \
    curl \
    nodejs \
    git \
    vim \
    wget \
    nkf \
    autoconf \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY --from=node /usr/local/bin/ /usr/local/bin
COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules


COPY ./laravel/ /var/www/laravel

COPY ./deploy/production/startup.sh /etc/
RUN chmod +x /etc/startup.sh

WORKDIR /var/www/laravel

CMD ["/etc/startup.sh"]
EXPOSE 8080
