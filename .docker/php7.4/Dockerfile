FROM php:7.4-fpm

ARG UID
ARG GID

ENV DEBIAN_FRONTEND noninteractive
ENV TERM            xterm-color

RUN usermod -u ${UID} -s /bin/bash www-data && groupmod -g ${GID} www-data

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    curl \
    openssl \
    nano \
    locales \
    tzdata \
    iproute2 \
    iputils-ping \
    zip \
    unzip \
    git

# Define locale PT-BR
RUN echo "pt_BR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen "pt_BR.UTF-8" && \
    dpkg-reconfigure --frontend=${DEBIAN_FRONTEND} locales && \
    update-locale LANG="pt_BR.UTF-8"

# Define Timezone America/Sao_Paulo
RUN ln -fs /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime && \
    dpkg-reconfigure -f ${DEBIAN_FRONTEND} tzdata

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions \
    pdo_pgsql \
    gd \
    zip \
    redis \
    pcntl \
    intl
    
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www