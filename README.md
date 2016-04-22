
PHP Helper Library for Best Buy
================================

This is a helper library for the Best Buy API. It is not an official library but something I cooked up for fun. Yes, I'm odd. - https://developer.bestbuy.com

## Ongoing Development

This PHP library is no longer maintained here. You can still download and install it via Composer as described below.

If you want to make requests, changes, or have suggestions, visit this repository on Gitlab:

https://gitlab.com/CaseySoftware/bestbuy-php

### Installing via Composer

The recommended way to install the Best Buy library is through [Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add the library as a dependency
php composer.phar require caseysoftware/bestbuy-helper ~2.0
```

or alternatively, you can add it directly to your `composer.json` file.

```json
{
    "require": {
        "caseysoftware/bestbuy-helper": "~2.0"
    }
}
```

Then install via Composer:

```bash
composer install
```

Finally, require Composer's autoloader in your PHP script:

```php
require __DIR__.'/vendor/autoload.php';
```
