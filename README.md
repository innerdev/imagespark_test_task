How it looks like
------------

![Screenshot of application](https://raw.githubusercontent.com/innerdev/imagespark_test_task/master/screenshot.png "Screenshot of application")

And yes, we have small REST API. Please, continue to read this manual.

Installation
------

You need MySQL (application was written with MySQL 8.0.19), PHP >= 7.2, NodeJS & NPM and Composer to install this application.

Clone the project somewhere:

```shell script
$ mkdir ~/imagespark_test_task
$ cd ~/imagespark_test_task
$ git clone https://github.com/innerdev/imagespark_test_task.git 
```

Create two MySQL databases, copy ```.env.example``` into ```.env``` inside root directory:

```shell script
$ cd ~/imagespark_test_task/imagespark_test_task
$ cp .env.example .env
```

And change the following lines if needed (pay attention to database names and login / password):

```shell script
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=main_database_name
DB_DATABASE_TESTING=testing_database_name
DB_USERNAME=user_database_username
DB_PASSWORD=user_password
```

We need MySQL database for unit testing, because:
1) As I think it's good when you have same environment for testing and production
2) SQLITE database, that is usually used for testing purposes, doesn't support REGEXP (needed in this application) 

Next steps is to set up the application, migrate and seed database, compile CSS and JS (needed for Bootstrap support). Run from the project root following command:

```shell script
$ composer update
$ npm install
$ npm run prod
$ php artisan migrate
$ php artisan db:seed
$ php artisan key:generate
```

Now let's start built-in web-server:

```shell script
$ php artisan serve --port=8085
```

That should be enough and everything should work just fine.
Try to open ```http://127.0.0.1:8085``` in your web-browser.

Usage
----

**Web-interface:**

Open root URI (```/```) to view web-interface of the application. It's just a simple searching form with Bootstrap.
This should be intuitive.


**API:**

API URI's going down here, you can open it in your web-browser, for example:

```shell script
/api/users
```
Sends full list of existing users.

```shell script
/api/users/name/sample_name
```
Search user by name, where ```{name}``` can be any string.

```shell script
/api/users/name/{name}/city/{city_name}
```
Search user by name and city name, where ```{name}``` and ```{city}``` can be any string.

Interesting parts
-------------
This is pretty regular application, but something interesting you can find here:

```shell script
App\Models\User class
scopeWithName method
```
(allows you to search user by different columns in database with only one input string)


Owner's task description:
------------

Разработать приложение по управлению пользователями.
Сделать возможность поиска по ФИО.
Сделать фильтрацию пользователей по городам.
Сделать внешнее апи для получения, поиска и фильтрации пользователей.
Данные которые должны быть у пользователя: 
- Имя
- Фамилия 
- Отчество
- Город проживания 
- Емэил

Поиск должен быть в одном инпуте.

Также необходимо написать тесты на ключевой функционал.
