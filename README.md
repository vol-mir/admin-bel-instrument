## Quick Start
```shell
$ git clone https://github.com/vol-mir/admin-bel-instrument.git
$ cd admin-bel-instrument
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate:refresh --seed
$ composer test:all
$ npm install
$ npm run dev
$ npm run prod
```

## Help
Share named routes between Laravel and Javascript:
```shell
$ php artisan route:json
```
