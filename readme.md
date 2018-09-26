Используя любой PHP-фреймворк создать приложение, которое имеет следующие возможности: любой пользователь приложения может выбрать любого другого пользователя приложения (кроме себя), чтобы сделать отложенный перевод денежных средств со своего счета на счет выбранного пользователя. При планировании такого перевода пользователь указывает сумму перевода в рублях, дату и время, когда нужно произвести перевод. Сумма перевода ограничена балансом клиента на момент планирования перевода с учетом ранее запланированных и невыполненных его исходящих переводов. Дата и время выбирается с точностью до часа с использованием календаря. Способ выбора пользователя - любой (можно просто ввод ID). Ввод данных должен валидироваться как на стороне клиента, так и на стороне сервера с выводом ошибок пользователю.
Показать на сайте список всех пользователей и информацию об их одном последнем переводе с помощью одного SQL-запроса к БД.
Реализовать сам процесс выполнения запланированных переводов. Не допустить ситуации, при которой у какого-либо пользователя окажется отрицательный баланс.
Написанный для решения задачи код не должен содержать уязвимостей. Процесс регистрации и проверки прав доступа можно не реализовывать. Для этого допустимо добавить дополнительное поле ввода для указания текущего пользователя. Внешний вид страниц значения не имеет.
Решение задачи должно содержать:

   1. Весь текст поставленного тестового задания. 
   2. Четкую инструкцию по развертыванию проекта с целью проверки его работоспособности. Приветствуется использование Docker. 
   3. Миграции и сиды для наполнения БД демонстрационными данными.
   
Решение можно прислать ссылкой на хранилище исходного кода (GitHub, Bitbucket и др.), либо в виде архива.


## Приложение для создания отложенных транзакций
 Данное приложение предназначено для передачи различных сумм между двумя пользователями в назначенное время
 
 Транзакции совершаются по серверному времени контейнера
### Для работы необходимо:
  1. Php 7.0
  2. Mysql 5.6
  3. composer
  4. npm
  5. docker
  
##### Приложение реализовано с помощью фреймворка Laravel

### Установка
 (Все дальнейшие пункты приведены с примером, когда папка, в которой находится проект называется "final_project")
 
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
 
 Для корректной работы отложенных переводов необходимо воспользоваться демоном cron:
       
   1. crontab -e    
   2. В конце файла указать
        
          * * * * * docker exec final_project_app_1 php artisan schedule:run >> /dev/null 2>&1
             
   3. Сохранить и выйти

### Тесты
 
        docker exec final_project_app_1 ./vendor/bin/phpunit
        
