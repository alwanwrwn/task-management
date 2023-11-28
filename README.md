## Task Management App

Build using Laravel, MySql, jQuery, and Bootstrap.

### Install
Clone the git repository on your computer
```
git clone https://github.com/alwanwrwn/task-management.git
```

After cloning the application, you need to install it's dependencies. 
```
cd task-management
composer install
```

### Setup
- When you are done with installation, copy the `.env.example` file to `.env`
```
cp .env.example .env
```

- Generate the application key
```
php artisan key:generate
```

- Add your database credentials to the necessary `env` fields

- Migrate the application
```
php artisan migrate
```

- Seed Database
```
php artisan db:seed --class=TaskSeeder
```

### Run the application
```
php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
