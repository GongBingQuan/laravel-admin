#!/bin/sh
if [ ! -f "./.env" ];then
  echo ".env不存在"
  sed -i 's/{APP_KEY}/'$APP_KEY'/' ./.env.example
  sed -i 's/{DB_HOST}/'$DB_HOST'/' ./.env.example
  sed -i 's/{DB_PASSWORD}/'$DB_PASSWORD'/' ./.env.example
  mv .env.example .env
  composer install
fi

set -e 
supervisord --nodaemon --configuration /etc/supervisor/conf.d/supervisord.conf

/usr/sbin/crond   -f  -L  /var/log/cron/cron.log

#exec redis-server --requirepass develop




