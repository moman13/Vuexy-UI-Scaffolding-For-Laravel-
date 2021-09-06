# this package for just ui scaffolding

## Installation

You can install the package via composer:

```bash
composer require moman12/dashboard_ui
```
You can publish and run the css/js with:

```bash
php artisan vendor:publish --provider="Moman12\DashboardUi\DashboardUiServiceProvider" --tag="assets"
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Moman12\DashboardUi\DashboardUiServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Moman12\DashboardUi\DashboardUiServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

``` php

php artisan ui vue --auth

npm install & npm run watch 
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [moman abed](https://github.com/momanabed)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
