# Use uma imagem base com Node.js
FROM node:lts-alpine

# Configure Yarn Repo
RUN yarn config set registry https://registry.npmjs.org/

# Defina o diretório de trabalho
WORKDIR /app

# Copie o script de inicialização para o container
COPY docker/yarn/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

RUN apk add --no-cache shadow

ARG HOST_UID=1000
ARG HOST_GID=1000

RUN usermod -u $HOST_UID node && \
    groupmod -g $HOST_GID node

USER node

# Healthcheck para verificar se o servidor está rodando
HEALTHCHECK --interval=30s --timeout=10s --start-period=10s --retries=3 \
  CMD ps aux | grep "yarn.*watch" | grep -v grep || exit 1

# Comando para iniciar o servidor do Laravel
CMD ["entrypoint.sh"]
#CMD ["sh", "-c", "while true; do sleep 1; done"]