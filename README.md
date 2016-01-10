[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/caseysoftware/bestbuy-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/caseysoftware/bestbuy-php/?branch=master) [![Code Climate](https://codeclimate.com/github/caseysoftware/bestbuy-php/badges/gpa.svg)](https://codeclimate.com/github/caseysoftware/bestbuy-php)

PHP Helper Library for Best Buy
================================

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

To use any of the examples, rename credentials-dist.php to credentials.php and add your API key from here: https://remix.mashery.com/apps/mykeys

## TODO

*  Implement lists for ~~Products~~, ~~Stores~~, ~~Reviews~~, ~~Categories~~, and Recommendations
*  Implement pagination for ~~Products~~, ~~Stores~~, ~~Reviews~~, ~~Categories~~, and Recommendations
*  ~~Search and return product information for a product based on a description or SKU?~~
*  ~~Search and return products based on review criteria~~
*  ~~Search and return product based on model number~~
*  ~~Search for what is included with a product, accessory skus and related SKUs~~
*  ~~All stores within a city~~
*  ~~All stores within a zipcode~~
*  ~~Stores closest to a specified geo-location~~
*  ~~Stores within a radius from a specific location~~
*  ~~Returns reviews for a specific product~~
*  ~~Returns reviews for a list of products~~
*  ~~Returns products with a rating greater then 4~~
*  ~~Returns reviews submitted on a specific date~~
*  ~~Return category information using category identifier~~
*  ~~Return category information using category name~~
*  Example Trending Products endpoint
