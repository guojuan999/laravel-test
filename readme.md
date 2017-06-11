<p align="center">This is a simple blog using Laravel framework</p>

## Installation

1 use git clone or download from the right top green link

2 If you have PHP installed locally and you would like to use PHP's built-in development server to serve the application, please use the following commands:
<p><strong>Note: before running migration, please add database 'blog' at mysql and mongodb</strong></p>

<p>2.1 php artisan migrate</p>
<p>2.2 php artisan serve</p>

<p>There are 2 users has been added in migration :</p>
<p>user : juan@gmail.com</p>
<p>password:  test1234</p>
<p>role: admin</p>
<p>Admin user could add/edit/read/delete any blog post</p>

<p>user: test@test.com</p>
<p>password: test1234</p>
<p>role:user</p>

<p>the normal user can only read blog posts but can be registered.</p>

There are some tests cases for User and Blog Posts at tests/Unit/UserTest.php and tests/Unit/BlogPostTest.php