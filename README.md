# Quiz System

A quiz system with admin panel made using Laravel, Mysql, and Bootstrap.

## Install

Install Composer

```bash
composer install
```

Install npm

```bash
npm install
```

Generate .env if not generated and add the neccessary information like database name to the .env file.

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

## Migrate and Seed from JSON

Run this command to seed the dummy data in \storage\app\json to the database.

```bash
php artisan migrate:fresh --seed
```

## Migrate and Seed with faker

In every "Seeder" folder there's a commented line that would allow you to use the factory and seed dummy data with faker and cusomize them as you want.

For example, in "database\seeders\UserSeeder.php"

```bash
//\App\Models\User::factory()->count(20)->create();
```

Then run

```bash
php artisan migrate:fresh --seed
```

## Login

In "database\migrations\2014_10_12_000000_create_users_table.php" I've inserted two rows in order to be inserted each time you run a migration to help with debugging.

```bash
        DB::table('users')->insert(
            array(
                'id'=>'1',
                'name' =>'Mohamed Elazab',
                'email' => 'admin@gmail.com',
                'password'=>bcrypt('admin123'),
                'type'=>'admin'
            ));
        DB::table('users')->insert(
            array(
                'id'=>'3',
                'name' =>'Mohamed Elazab Student',
                'email' => 'student@gmail.com',
                'password'=>bcrypt('student123'),
                'type'=>'student'
            ));
```

## Logo

If you want to change the logo you can change the SVG files from the following files;

```bash
resources\views\components\application-logo.blade.php
resources\views\components\application-mark.blade.php
resources\views\components\authentication-card-logo.blade.php

```

## Favicon

To change your favicon, go to public/favicon.ico and replace it with your own favicon.
