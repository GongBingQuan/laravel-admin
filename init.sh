#!/bin/bash
set -e
supervisord --nodaemon --configuration /etc/supervisor/conf.d/supervisord.conf

/usr/sbin/crond   -f  -L  /var/log/cron/cron.log

if [ ! -f "./env" ];then
  echo ".env不存在"
  if [ -z $DB_PASSWORD ]; then
    sed -i 's/{APP_KEY}/'$APP_KEY'/' ./.env.example
    sed -i 's/{DB_HOST}/'$DB_HOST'/' ./.env.example
    sed -i 's/{DB_PASSWORD}/'$DB_PASSWORD'/' ./.env.example
    
  else
    echo ".环境变量DB_PASSWORD不存在"
  fi
fi
if [ ! -f "./vendor" ];then
  composer install
fi
