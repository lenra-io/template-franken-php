
Local development environment for PHP projects.

```bash
# Install dependencies
docker run --rm --interactive --tty -v $PWD:/app composer install
# Start the server
docker run --name frankenphp --rm -v $PWD/src:/app/public -p 8080:8080 -e 'SERVER_NAME=:8080' dunglas/frankenphp
```

Local deps:

```bash
docker run --rm --interactive --tty -v ~/lenra:/app --workdir /app/templates/template-franken-php composer install
```