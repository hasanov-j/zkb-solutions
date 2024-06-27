FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    libpq-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libicu-dev \
    redis-tools

# need to check the port state (up or closed)
RUN apt-get update && apt-get install -y \
    nmap

# Установите расширение PHP для Redis
RUN pecl install redis && docker-php-ext-enable redis

# install nodejs and npm
RUN mkdir -p /usr/local/nvm
ENV NVM_DIR /usr/local/nvm
# IMPORTANT: set the exact version
ENV NODE_VERSION v20.10.0
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash
RUN /bin/bash -c "source $NVM_DIR/nvm.sh && nvm install $NODE_VERSION && nvm use --delete-prefix $NODE_VERSION"
# add node and npm to the PATH
ENV NODE_PATH $NVM_DIR/versions/node/$NODE_VERSION/bin
ENV PATH $NODE_PATH:$PATH

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-configure intl --enable-intl
RUN docker-php-ext-install intl pdo pdo_mysql mbstring zip exif pcntl bcmath gd ftp

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install xdebug

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Установите директорию приложения Laravel
WORKDIR /var/www

# Проверяем существование папки ./.data/redis перед установкой прав доступа
RUN if [ -d ./data/redis ]; then chmod -R 777 ./data/redis; fi

# Copy existing application directory contents
#COPY ../../application /var/www

# Copy existing application directory permissions
#COPY --chown=www:www ../../application /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
