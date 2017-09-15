FROM alpine
MAINTAINER Odinn Adalsteinsson <oad@dwarf.dk>

# Install tools we usually need
RUN apk add --no-cache git curl mariadb-client openssh-client ca-certificates openssl joe

# Install php7 and extensions
RUN apk add --no-cache php7 \
    php7-bcmath \
    php7-ctype \
    php7-curl \
    php7-dom \
    php7-exif \
    php7-fileinfo \
    php7-fpm \
    php7-gd \
    php7-iconv \
    php7-intl \
    php7-json \
    php7-mbstring \
    php7-mcrypt \
    php7-memcached \
    php7-mysqli \
    php7-opcache \
    php7-openssl \
    php7-pdo \
    php7-pdo_mysql \
    php7-phar \
    php7-redis \
    php7-session \
    php7-simplexml \
    php7-tokenizer \
    php7-xdebug \
    php7-xml \
    php7-xmlreader \
    php7-xmlwriter \
    php7-xsl \
    php7-zip \
    php7-zlib

# Configure PHP and PHP-FPM
COPY php/php.ini /etc/php7/
COPY php/php-fpm.d/*.conf /etc/php7/php-fpm.d/

# Clean up
RUN rm -rf /tmp/* /var/cache/apk/*

# Finish in the project root
WORKDIR /app

EXPOSE 9000
CMD ["/usr/sbin/php-fpm7"]
