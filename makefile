include .env

ownership: #Set ownership
	sudo chown $(USER):$(USER) . -R

build:
	sudo docker-compose up --build -d

key-generate:
	sudo docker-compose exec php-fpm php artisan key:generate

config-cache:
	sudo docker-compose exec php-fpm php artisan config:cache

connect-db:
	sudo docker-compose exec db bash

connect-app:
	sudo docker-compose exec php-fpm bash

composer-install:
	sudo docker-compose exec php-fpm composer install

backup_db:
	sudo docker exec laravel-store-db /usr/bin/mysqldump -u root --password=$(DB_ROOT_PASSWORD) $(DB_DATABASE) > ./docker/var/mysql/backup.sql

restore_db:
	cat ./docker/var/mysql/backup.sql | docker exec -i laravel-store-db /usr/bin/mysql -u root --password=$(DB_ROOT_PASSWORD) $(DB_DATABASE)