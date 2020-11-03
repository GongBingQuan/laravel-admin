FROM tcyfree/lnmp-docker


# install composer
RUN cd /tmp \
  && wget https://install.phpcomposer.com/composer.phar \
  && chmod a+x composer.phar \
  && mv composer.phar /usr/local/bin/composer \
  && composer config -g repo.packagist composer https://mirrors.aliyun.com/composer 
EXPOSE 80
COPY . /usr/share/nginx/html
#RUN composer install --no-scripts

RUN composer install