[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/caseysoftware/bestbuy-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/caseysoftware/bestbuy-php/?branch=master)

PHP Helper Library for Best Buy
================================

### Installing via Composer

The recommended way to install the Best Buy library is through [Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add Clarify as a dependency
php composer.phar require caseysoftware/bestbuy-php dev-master@dev
```

or alternatively, you can add it directly to your `composer.json` file.

```json
{
    "require": {
        "caseysoftware/bestbuy-php": "dev-master@dev"
    }
}
```

Then install the libraries via Composer:

```bash
composer install
```

Finally, require Composer's autoloader in your PHP script:

```php
require __DIR__.'/vendor/autoload.php';
```
## TODO

*  Implement lists for ~~Products~~, ~~Stores~~, Reviews, Categories, and Recommendations
*  Implement pagination for ~~Products~~, ~~Stores~~, Reviews, Categories, and Recommendations
*  Add more to this todo list