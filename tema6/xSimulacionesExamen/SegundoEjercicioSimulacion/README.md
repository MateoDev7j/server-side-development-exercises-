## CREAR UN PROYECTO EN LARAVEL COMANDO DESDE POWERSHELL: ##
docker run --rm -v "${PWD}:/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer create-project laravel/laravel nombre-proyecto
