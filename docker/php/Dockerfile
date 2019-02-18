FROM php:7.2-apache

# install java (necessary for selenium)
RUN apt-get update
RUN apt-get -y install software-properties-common
RUN add-apt-repository -y ppa:webupd8team/java
RUN echo debconf shared/accepted-oracle-license-v1-1 select true | debconf-set-selections
RUN echo debconf shared/accepted-oracle-license-v1-1 seen true | debconf-set-selections
RUN apt-get update
RUN mkdir -p /usr/share/man/man1
RUN apt-get -y --allow-unauthenticated install oracle-java8-installer

# Firefox browser to run the tests
#RUN apt-get install -y firefox

# Gecko Driver
ENV GECKODRIVER_VERSION 0.24.0
RUN wget --no-verbose -O /tmp/geckodriver.tar.gz https://github.com/mozilla/geckodriver/releases/download/v$GECKODRIVER_VERSION/geckodriver-v$GECKODRIVER_VERSION-linux64.tar.gz \
  && rm -rf /opt/geckodriver \
  && tar -C /opt -zxf /tmp/geckodriver.tar.gz \
  && rm /tmp/geckodriver.tar.gz \
  && mv /opt/geckodriver /opt/geckodriver-$GECKODRIVER_VERSION \
  && chmod 755 /opt/geckodriver-$GECKODRIVER_VERSION \
  && ln -fs /opt/geckodriver-$GECKODRIVER_VERSION /usr/bin/geckodriver \
  && ln -fs /opt/geckodriver-$GECKODRIVER_VERSION /usr/bin/wires

RUN apt-get update
RUN apt-get install -y --no-install-recommends vim less git libcurl3-dev zlib1g-dev unzip

RUN docker-php-ext-install curl zip

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
