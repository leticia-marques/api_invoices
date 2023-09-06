from php:8.1

workdir /home

run apt update && apt install -y nodejs npm postgresql libpq-dev vim sudo unzip zip \
                                                                                        git \
                                                                                        curl \
                                                                                        libpng-dev \
                                                                                        libonig-dev \
                                                                                        libxml2-dev


run apt-get update -y
run apt-get install -y unzip libpq-dev libcurl4-gnutls-dev

run docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath pdo gd

copy --from=composer/composer:latest-bin /composer /usr/bin/composer

expose 8000 3001