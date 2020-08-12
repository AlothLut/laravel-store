include .env

ownership: #Set ownership
	sudo chown $(USER):$(USER) . -R

build:
	docker-compose up --build -d

key-generate:
	docker-compose exec php-fpm php artisan key:generate

config-cache:
	docker-compose exec php-fpm php artisan config:cache