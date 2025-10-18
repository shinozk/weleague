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

RUN ls -l

COPY ./laravel/ /var/www/html
RUN ls -l
WORKDIR /var/www/html
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html

#COPY startup.sh /etc/
#RUN chmod +x /etc/startup.sh

#CMD ["/etc/startup.sh"]

RUN ls -l

RUN composer install

RUN npm install
RUN npm run build
CMD ["artisan", "serve", "--host", "0.0.0.0", "--port", "8080"]

EXPOSE 8080
