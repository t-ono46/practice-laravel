service_name := app

install:
	cp laravel/.env.example laravel/.env
	sudo docker-compose up -d --build
	sudo docker-compose exec $(service_name) composer install
	make npm-run
	sudo docker-compose exec $(service_name) php artisan key:generate
	make cache
	make migrate-fresh
	sudo chmod -R 777 laravel/storage
	-sudo rm laravel/public/storage
	sudo docker-compose exec $(service_name) php artisan storage:link
up:
	sudo docker-compose up -d
down:
	sudo docker-compose down
destroy:
	sudo docker-compose down --rmi all --volumes --remove-orphans

cache:
	sudo docker-compose exec $(service_name) php artisan cache:clear
	sudo docker-compose exec $(service_name) php artisan config:clear
	sudo docker-compose exec $(service_name) php artisan route:clear
	sudo docker-compose exec $(service_name) php artisan view:clear
	sudo docker-compose exec $(service_name) composer dump-autoload
	sudo docker-compose exec $(service_name) php artisan clear-compiled
	sudo docker-compose exec $(service_name) php artisan optimize
	sudo docker-compose exec $(service_name) php artisan config:cache

npm-run:
	sudo docker-compose exec $(service_name) npm install
	sudo docker-compose exec $(service_name) npm run dev
npm-watch:
	sudo docker-compose exec $(service_name) npm install
	sudo docker-compose exec $(service_name) npm run watch

migrate:
	sudo docker-compose exec $(service_name) php artisan migrate
migrate-rollback:
	sudo docker-compose exec $(service_name) php artisan migrate:rollback
migrate-fresh:
	sudo docker-compose exec $(service_name) composer dump-autoload
	sudo docker-compose exec $(service_name) php artisan migrate:fresh --seed

bash:
	sudo docker-compose exec $(service_name) bash