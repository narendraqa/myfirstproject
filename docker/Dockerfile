#Download base image ubuntu 16.04
FROM ubuntu:16.04

# Update Software repository
RUN apt-get update -y
RUN apt-get install -y software-properties-common python-software-properties
RUN apt-get install -y git curl apache2
#RUN export LANG=C.UTF-8
RUN LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php
RUN apt-get update -y
RUN apt-get install php5.6 php5.6-mbstring php5.6-mcrypt php5.6-mysql php5.6-xml php5.6-intl php5.6-intl php5.6-mbstring  php5.6-cli php5.6-gd php5.6-curl php5.6-sqlite3 -y


# Install app
RUN rm -rf /var/www/*

# Configure apache
RUN a2enmod rewrite
RUN git clone https://github.com/narendraqa/myfirstproject.git /var/www/html
RUN chown -R www-data:www-data /var/www/html
EXPOSE 80
CMD apachectl -D FOREGROUND

