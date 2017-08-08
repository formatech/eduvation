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

> **Note: ** Don't forget to define the views in the `resources\views` folder
