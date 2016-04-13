#  Sculpin Gulp Bundle

This bundle will allow you to run gulp tasks from the `sculpin generage` command.

For example, you might want to build some SASS files to CSS, minify or concat your asset files.

## Setup

Edit your `sculpin.json` file to include this package:

```json
{
    "require": {
        "petemc/sculpin-gulp-bundle": "@dev"
    }
}
```

then install by running `sculpin update`.

Create (or update an existing) `app/SculpinKernel.php` file to require the package with the following code:

```php
<?php

class SculpinKernel extends \Sculpin\Bundle\SculpinBundle\HttpKernel\AbstractKernel
{
    protected function getAdditionalSculpinBundles()
    {
        return [
            'PeteMc\Sculpin\SculpinGulpBundle\SculpinGulpBundle'
        ];
    }
}
```

## How to use