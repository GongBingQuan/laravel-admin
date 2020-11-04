#!/bin/bash

sed -i 's/{APP_KEY}/${APP_KEY}/' /usr/share/nginx/htm/.env.example
sed -i 's/{DB_HOST}/${DB_HOST}/' /usr/share/nginx/htm/.env.example
sed -i 's/{DB_PASSWORD}/${DB_PASSWORD}/' /usr/share/nginx/htm/.env.example