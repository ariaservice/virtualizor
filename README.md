# Virtualizor

A Laravel 11 package for virtualization.

## Installation

You can install the package via composer:

```bash
composer require Ariaservice/virtualizor
```

## Usage

```php
use Ariaservice\Virtualizor\Facades\Virtualizor;

$result = Virtualizor::virtualize($data);
```

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --provider="YourName\Virtualizor\VirtualizorServiceProvider" --tag="config"
```

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
# virtualizor
