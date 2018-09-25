## Приложение для создания отложенных транзакций
 Данное приложение предназначено для передачи различных сумм между двумя пользователями в назначенное время  
### Для работы необходимо указать:
  1. Php 7.0
  2. Mysql 5.7
  3. composer
  4. npm
  
##### Приложение реализовано с помощью фреймворка Laravel

### Установка
 (Для установки небходим composer)
 
     1. git clone https://github.com/WhiteFoOx/final_project path_to_dir
     2. cd path_to_dir   
     3. docker run --rm -v $(pwd):/app composer install
     4. cp .env.example .env
     5. Отредактировать .env
     6. docker-compose up
     7. docker-compose exec app php artisan key:generate
     8. docker-compose exec app php artisan optimize
     9. sudo chmod -R 777 storage && sudo chmod -R 777 bootstrap/cache
