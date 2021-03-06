FROM zzjgbq/lnmp-docker:v1

COPY . /usr/share/nginx/html

# install composer
RUN wget https://install.phpcomposer.com/composer.phar \
  && chmod a+x composer.phar \
  && mv composer.phar /usr/local/bin/composer \
  && composer config -g repo.packagist composer https://mirrors.aliyun.com/composer 
EXPOSE 80

#RUN composer install --no-scripts

#RUN composer install  && sh init.sh && echo $DB_PASSWORD