setup:
	@make up
build:
	composer-install
stop:
	docker-compose stop
up:
	php artisan serve
composer-update:
	docker exec -it app bash -c "composer update"

app-terminal:
	docker exec -it app bash
