# syntax=docker/dockerfile:1.4

# composer
FROM composer as composer
ADD --link composer.json ./
ADD --link composer.lock ./
RUN \
    --mount=type=cache,sharing=locked,uid=1000,gid=1000,target=/root/.composer\
    composer install --prefer-dist --no-scripts --no-dev

# files
FROM dunglas/frankenphp as files
WORKDIR /app/public
ADD --link src ./

# of-watchdog
FROM ghcr.io/openfaas/of-watchdog:0.9.10 as of-watchdog

# runtime
FROM files as runtime
ENV \
    exec_timeout="3600"\
    read_timeout="3600"\
    suppress_lock="true"\
    mode="http"\
    SERVER_NAME=":3000"\
    upstream_url="http://127.0.0.1:3000"\
    write_timeout="3600"\
    fprocess="docker-php-entrypoint --config /etc/caddy/Caddyfile --adapter caddyfile"
WORKDIR /app
COPY --link --chown=1000:1000 --from=composer "/app/vendor" "/app/vendor"
COPY --link --chown=1000:1000 --from=of-watchdog "/fwatchdog" "/fwatchdog"
USER 1000
EXPOSE 8080
HEALTHCHECK --interval=3s --timeout=1s --start-period=3s --retries=10 CMD curl -f http://localhost:2019/metrics || exit 1
CMD ["/fwatchdog"]
