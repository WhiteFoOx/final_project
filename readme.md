## Приложение для создания отложенных транзакций
 Данное приложение предназначено для передачи различных сумм между двумя пользователями в назначенное время  
### Для работы необходимо указать:
  1. Php 7.0
  2. Mysql 5.7
  3. composer
  4. npm
  5. docker
  
##### Приложение реализовано с помощью фреймворка Laravel

### Установка
 (Для установки небходим composer)
 
     1. git clone https://github.com/WhiteFoOx/final_project.git
     2. cd final_project   
     3. docker run --rm -v $(pwd):/app composer install
     4. sudo chmod -R 777 vendor/
     5. cp .env.example .env
     6. Отредактировать .env
     7. docker-compose up -d --build
     8. docker-compose exec app php artisan key:generate
     9. docker-compose exec app php artisan optimize
     10. docker-compose exec app php artisan migrate --seed
     11. sudo chmod -R 777 storage && sudo chmod -R 777 bootstrap/cache
     12. npm install
