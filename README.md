## Installation

Clone the repo locally using the command below or download the zip file:

```sh
git clone https://github.com/moktan456/School-Management-System.git
cd School-Management-System
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```

Build assets:
For development run
```sh
npm run watch
```

Setup configuration:
```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an empty database and update .env file
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Run database migrations:
```sh
php artisan migrate
```
Run database seeder:
```sh
php artisan db:seed
```

Run the dev server and click the link generated or open browser and enter 127.0.0.1:8000:
```sh
php artisan serve
```
