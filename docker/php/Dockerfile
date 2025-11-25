FROM php:8.1-fpm

COPY php.ini /usr/local/etc/php/

RUN apt update \
  && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
  && docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer self-update

WORKDIR /var/www

# ホストのUID/GIDと一致させるための引数（デフォルト値：1000）
ARG USER_ID=1000
ARG GROUP_ID=1000

# ホストと同じUID/GIDでユーザーとグループを作成
RUN groupadd -g $GROUP_ID laravel \
  && useradd -u $USER_ID -g laravel -m -s /bin/bash laravel

# 作業ディレクトリの所有権をlaravelユーザーに付与
RUN chown -R laravel:laravel /var/www

# 以降の処理はlaravelユーザーで実行
USER laravel