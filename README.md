# Filament Country,State,And City Selection.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ibrahimbougaoua/filament-country-state-city.svg?style=flat-square)](https://packagist.org/packages/ibrahimbougaoua/filament-country-state-city)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ibrahimbougaoua/filament-country-state-city/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ibrahimbougaoua/filament-country-state-city/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ibrahimbougaoua/filament-country-state-city/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ibrahimbougaoua/filament-country-state-city/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ibrahimbougaoua/filament-country-state-city.svg?style=flat-square)](https://packagist.org/packages/ibrahimbougaoua/filament-country-state-city)

The Filament Country State City Package streamlines country, state, and city selection in FilamentPHP applications.

## Installation

You can install the package via composer:

```bash
composer require ibrahimbougaoua/filament-country-state-city
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-country-state-city-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-country-state-city-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-country-state-city-views"
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ibrahim](https://github.com/ibrahimBougaoua)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
