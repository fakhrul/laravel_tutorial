# laravel_tutorial

## Development environment
1. Windows 10 
2. XAMPP (for MySql is running)
3. Clone or download this code this code

## Step by Step
1. Create database named as laravel_tutorial
2. Edit environments (.env)
```php
DB_DATABASE=laravel_tutorial
DB_USERNAME=root
DB_PASSWORD=
```
3. create model BlogPost with migration script
```php
php artisan make:model BlogPost --migration
```
4. edit migration script
```php
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('content');
            $table->timestamps();
        });
```
5. Run migrations
```php
php artisan migrate
```
6. Create Controller
```php
php artisan make:controller BlogPostController --resource --model=BlogPost
```
7. Update the blank method (refer to the code) in BlogPostController

8. Run php artisan serve
