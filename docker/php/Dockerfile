FROM php:8-fpm

# Install dependencies (needed for composer)
RUN apt-get update -qq \
	&& apt-get install -y -qq --no-install-recommends \
	    apt-utils \
        locales \
        libicu-dev \
        libbz2-dev \
        unzip \
        libzip-dev \
        zip \
        git \
        g++ \
        ssh \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        python \
        wget \
        curl \
        nano

#	libfreetype6-dev \
#        libjpeg62-turbo-dev \
#	libmagickwand-dev --no-install-recommends \
#        libpng-dev \

# Install imageick
#RUN pecl install imagick \
#    && docker-php-ext-enable imagick

# Set timezone
RUN rm /etc/localtime \
	&& ln -s /usr/share/zoneinfo/Europe/Belgrade /etc/localtime

# Install locales
RUN echo "en_US.UTF-8 UTF-8" >> /etc/locale.gen \
	&& locale-gen

RUN docker-php-ext-install -j$(nproc) opcache pdo pdo_mysql intl zip bz2 bcmath gd
RUN docker-php-ext-configure intl
RUN docker-php-ext-configure opcache --enable-opcache
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-configure zip

RUN pecl install apcu
RUN docker-php-ext-enable apcu

RUN echo "date.timezone = Europe/Belgrade" > /usr/local/etc/php/conf.d/timezone.ini \
    && echo "short_open_tag = off" > /usr/local/etc/php/conf.d/short_open.ini \
    && echo "upload_max_filesize = 256M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = 512M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 256M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "realpath_cache_size = 4096K" >> /usr/local/etc/php/conf.d/realpath.ini \
    && echo "realpath_cache_ttl = 600" >> /usr/local/etc/php/conf.d/realpath.ini \
    && echo "opcache.memory_consumption = 256" > /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.interned_strings_buffer = 8" > /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.max_accelerated_files = 20000" > /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.revalidate_freq = 60" > /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.fast_shutdown = 1" > /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.enable_cli = 1" > /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.enable = 1" > /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.preload = /var/www/config/preload.php" > /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.preload_user = www-data" > /usr/local/etc/php/conf.d/opcache.ini

# install xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN echo "xdebug.idekey=\"PHPSTORM\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.mode=develop,debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install composer
RUN php -r "readfile('https://getcomposer.org/installer');" > composer-setup.php \
	&& php composer-setup.php --install-dir=/usr/local/bin/ --filename=composer \
	&& php -r "unlink('composer-setup.php');"

EXPOSE 9000

CMD ["php-fpm"]