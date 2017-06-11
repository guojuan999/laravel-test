<p align="center">This is a simple blog using Laravel framework</p>

## Installation

1 use git clone or download from the right top green link

2 If you have PHP installed locally and you would like to use PHP's built-in development server to serve the application, please use the following commands:
Note: before running migration, please add database 'blog' at mysql and mongodb

2.1 php artisan migrate
2.2 php artisan serve

There are 2 users has been added in migration :
user : juan@gmail.com
password:  test1234
role: admin
Admin user could add/edit/read/delete any blog post

user: test@test.com
password: test1234
role:user

the normal user can only read blog posts but can be registered.