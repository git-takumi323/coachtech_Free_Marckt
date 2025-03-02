FROM php:7.4.9-fpm
# PHP 7.4.9（FPM）をベースにする	Laravel で Nginx + PHP-FPM を使うため、PHP-FPM イメージをベースにする
# PHP の拡張モジュールをインストールする	MySQL と Zip 拡張モジュールをインストールする


COPY php.ini /usr/local/etc/php/

RUN apt update \
  && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
  # Laravel で MySQL に接続できるようにするため、MySQL クライアントをインストールする
  && docker-php-ext-install pdo_mysql zip
  # PHP 拡張機能を有効化	MySQL 接続 (pdo_mysql) と .zip の扱いをサポート

RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer self-update
  # Composer をダウンロードしてインストールする

WORKDIR /var/www
# 作業ディレクトリを設定する	/var/www に作業ディレクトリを設定する