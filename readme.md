Eduvation - Laravel Course
============================

# Day 1 - Setup

## Installation
Make sure you have installed 

    - Virtual box
    - Vagrant
    - Git 

- restart the pc

## Vagrant: Add the homestead box 
The homestead box is download under the `Temporary Files Drive\homestead-box`, copy the `homestead-box` directory to your local drive `c:\`

```sh
cd c:/homestead-box
vagrant box add homestead.json
```

## Homestead: Install homestead commands

```sh
git clone https://github.com/laravel/homestead.git Homestead
git checkout v5.4.0
init.bat
```

> You can find more details on the Laravel Official docs http://laravel.com/docs

## Create your SSH key
```sh
ssh-keygen -t rsa 
```

# Day 1 - Introduction to Laravel
In this session we have learned how to install homestead, so we have a clean environment for development.

We passed over Laravel folder structure, then started by making our first routes.

Within the `web.php` file, we registered `/users` and `/users/:id` to render the list of users and the user details pages.

> **Note:** Don't forget to define the views in the `resources\views` folder


# Day 2
In this session we learned how to make a separate Repository to encapsulate the user management logic in a separate class.

First we have developed the **Fake User Repository** or **In Memory User Repository**, then we switched back to the **Database User Repository**. 

The goal of using such abstraction is to separate the User Store management from the Business Logic of our app. So the switching  process should not affect other parts of the app, in other words you should not change any line of code when switching between Repositories.

> **Note:** you can see the InMemory User Repository on this Github link [Users.php](https://github.com/formatech/eduvation/blob/46cb5f60ba784b193597c33f7ca06cf855d506f8/app/Repositories/Users.php)

Next, we have moved our code logic from the routing file `web.php` to the `StudentsController` in this way we keep our `web.php` file clean and neat.


> **Note:** Keep in mind, there is no golden rule, whether to use Repository or not, or to keep your code in `web.php` or in the controller, it's up to you, just be consistent with your team, and keep things clean.

In order to keep control of the database versions, we have used migrations by

```sh
php artisan make:migration create_table_students
```

then open the new migration file and update it then

```sh
# to apply the migration or 
php artisan migrate 

# to go down with your migrations
php artisan migrate:rollback
```

> **Note:** the commands should be run from the homestead virtual machine and not from your pc

To login to the homestead terminal

```sh
cd c:\Homestead # or where you have created your homestead
vagrant up # only if the vm is not running
vagrant ssh # login through ssh
```

After that we have created the **Student** model and that's all.

Now we can use the **Student** model in our code and laravel automatically know how to map it to the **students** table in the database.


Last, we learned how to inject our dependencies instead of creating a new instance by ourself, this approach has many benefits, one of them is to keep developers away from the configuration part.

To do so we should teach laravel how to resolve these dependencies by registering them in our `app\Providers\AppServiceProvider.php`

```php
public function register()
{
    $this->app->bind('App\Office365', function() {

        // file /config/services.php
        return new \App\Office365(config('services.office365'));
    });
}
```


