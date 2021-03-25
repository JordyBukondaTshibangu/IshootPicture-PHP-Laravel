# I-SHOOT-PICTURE -LARAVEL-WEB-SERVER-APP


### Table of content 

* General info
* Technologies
* Setup

### Introduction 

This is a simple Laravel app with a blade template engine

### Technologies

* PHP
* Laravel
* Sqlite

### Perequisite

Before launching this project you must ensure that have mysql, php, and composer

Bellow are the links to help you installing it:

 —> www.wampserver.com › download-wampserver-64bits

—>  https://www.mamp.info/en/downloads/

—> https://windows.php.net/download/

—>  https://www.php.net/manual/en/install.macosx.php

—> https://getcomposer.org/download/


### Launch

*  git clone git@github.com:JordyBukondaTshibangu/I-SHOOTPICTURE--LARAVEL-PHP-APP.git
* cd I-SHOOTPICTURE--LARAVEL-PHP-APP
* npm install 
* composer install
* cp .env.example .env
* php artisan key:generate
* php artisan migrate:fresh
* php artisan storage:link
* php artisan serve 



## APP STRUCTURE AND KEY POINTS


- [x] API ==> Server
	
	composer create-project laravel/laravel ARTICLE-BLOG-LARAVEL-PHP-PROJECT		

- [x] Database  => Database	
	
	set up the .env file 
    
	DB_CONNECTION=sqlite


- [x] API ==> Models

	For the model we need to run the migration in order for them to reach the database

	We have to instances : 
	Post : we need to add the following fields in the migration file (caption, image, user_id)
	User : we need to add the following fields in the migration file (name, email, password)
	Profile : we need to add the following fields in the migration file ( user_id, title, description, url, image)

	To create the model run the following command : 

	* php artisan make : model Profile -m (It creates the Model and the migration)
	* php artisan make : model Post -m (It creates the Model and the migration)
	
	After creating the model and the migrations, you can run the migration : 

	* php artisan migrate

- [x] API ==> Model Relationships
	
* 	Create a method in the Profile model ( user ) ==> Profile belongsTo User

* 	Create a method in the User model ( profile ) ==> User hasOne Profile

* 	Create a method in the Post model ( user ) ==> Post belongsTo User

* 	Create a method in the User model ( posts ) ==> User hasMany Post

	
- [x] API ==> Controllers

	It dictates the logic, the way data must be saved, retrieved, updated, and delete
	to create controllers run the following command : 

	* php artisan make : controller PostControl --r (it creates the controller and the resources including index, store, edit, update, delete)

	* php artisan make : controller ProfileControl 

	For the image upload and rendering use : 

	* php artisan storage:link


- [x] API ==> Routes

The routes are : 

		Auth::routes();

		Route::get('/', 'PostsController@index');

		Route::get('/posts/create', 'PostsController@create');

		Route::get('/posts/{post}', 'PostsController@show');

		Route::post('/posts', 'PostsController@store');

		Route::get('/profile/{user}', 'ProfileController@index')->name('home');

		Route::get('/profile/{user}/edit', 'ProfileController@edit');

		Route::patch('/profile/{user}', 'ProfileController@update');

		Route::post('/follow/{user}', 'FollowController@store');


- [x] MIDDLEWARE ==> Auth

	To enable authentication in Laravel you can simply run the following command : 

	* php artisan make:auth 
