FROM tcyfree/apnsc
        
COPY . /usr/share/nginx/html
RUN cd /usr/share/nginx/html \
    && composer install
EXPOSE 80