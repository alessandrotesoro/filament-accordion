# Laravel Filament Accordion

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sematico/filament-accordion.svg?style=flat-square)](https://packagist.org/packages/sematico/filament-accordion)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/alessandrotesoro/filament-accordion/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/alessandrotesoro/filament-accordion/actions?query=workflow%3Arun-tests+branch%3Amain)

Filament plugin that provides a new Accordion component for forms.

<image src=".github/screenshot.png" width="100%"/>

## Installation

You can install the package via composer:

```bash
composer require sematico/filament-accordion
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-accordion-views"
```

## Usage

```php
use Sematico\FilamentAccordion\Forms\Components\Fields\Accordions;

Accordions::make('article')
	->label( __( 'Article settings' ) )
	->accordions([
		Accordions\Accordion::make('my_accordion')
			->label( __( 'Accordion 1' ) )
			->description( __( 'Optional description' ) )
				->schema([
					// Form inputs here...
				]),
		Accordions\Accordion::make('my_other_accordion')
			->label( __( 'Accordion 2' ) )
			->description( __( 'Optional description' ) )
			->schema([
				// Form inputs here...
			]),
		])
->compact(),
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

- [Alessandro Tesoro](https://github.com/alessandrotesoro)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
