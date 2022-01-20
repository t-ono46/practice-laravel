# mynote

```
# after git clone
cd mynote
docker compose up -d --build
docker compose exec app bash
composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
chmod -R 777 storage bootstrap/cache
php artisan migrate
php artisan ui bootstrap
npm install && npm run dev
```
http://localhost:8081/