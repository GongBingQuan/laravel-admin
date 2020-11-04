#!/bin/bash
sed -i 's/{APP_KEY}/'${APP_KEY}'/' ./.env.example
sed -i 's/{DB_HOST}/'${DB_HOST}'/' ./.env.example
sed -i 's/{DB_PASSWORD}/'${DB_PASSWORD}'/' ./.env.example

echo ${APP_KEY}'+'${DB_HOST}'+'${DB_PASSWORD}