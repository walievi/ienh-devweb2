# Base image com PHP 8.2 e Apache
FROM php:8.2-fpm

# Defina o diretório de trabalho
WORKDIR /var/www/html

RUN docker-php-ext-install pdo_mysql

# Atualize e instale apenas o necessário
#RUN apt-get update && apt-get install -y \
#    php-mysql
#    git \
#    zip \
#    libpq-dev \
#    && apt-get clean

# Instale o Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copie os arquivos de configuração necessários
COPY ./docker/webapp/.env /tmp/.env
COPY docker/webapp/entrypoint.sh /usr/local/bin/entrypoint.sh

# Torne o script de entrada executável
RUN chmod +x /usr/local/bin/entrypoint.sh

# Exponha a porta padrão do Laravel
EXPOSE 8000

# Comando para iniciar o servidor Laravel
CMD ["entrypoint.sh"]