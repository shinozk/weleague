FROM php:8.4-alpine

RUN apk add --update --no-cache build-base
RUN apk update && \
    apk --no-cache add libpng libjpeg libpng-dev libjpeg-turbo-dev autoconf build-base tzdata nodejs npm && \
    cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    apk del tzdata && \
    rm -rf /var/cache/apk/*

 
RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ && \
    docker-php-ext-install -j$(nproc) pdo pdo_mysql exif bcmath gd && \
    apk del libpng-dev libjpeg-turbo-dev #&& \

COPY php*.ini /usr/local/etc/php/conf.d/

#COPY ./laravel/ /var/www/html
WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html

COPY startup.sh /etc/
RUN chmod +x /etc/startup.sh

CMD ["/etc/startup.sh"]

EXPOSE 80
