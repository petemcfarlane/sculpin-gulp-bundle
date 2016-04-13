#  Sculpin Gulp Bundle

This bundle will allow you to run gulp tasks from the `sculpin generage` or `sculpin generate --watch` commands.

For example, you might want to build some SASS files to CSS, minify or concat your asset files.

## Pre-requisites

This package currently isn't as fancy as to install npm or gulp, that task is left up to the user. These commands will install gulp as an npm package.

First make sure you have a `package.json` file with this command

`$ [ -f package.json ] && echo "package.json exists" || echo "{}" > package.json`

Require gulp as a dev dependancy

`$ npm install gulp --save-dev`

Check gulp is working

`$ gulp`

Create a `gulpfile.js` in your project root and put your tasks in there. You should name one task `sculpin`, as this will be run by the `sculpin generate` command (see example further down).

## Setup

Edit your `sculpin.json` file to include this package, then install by running `sculpin update`.

```json
{
    "require": {
        "petemc/sculpin-gulp-bundle": "@dev"
    }
}
```


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

Create a `gulpfile.js` in the root of your Sculpin project. Make sure you have a task called `sculpin`. This will be executed after each regeneration of the Sculpin site, either with `sculpin generate` or `sculpin generate --watch`

Example `gulpfile.js` which runs one task to build sass:

```js
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cleanCss = require('gulp-clean-css');

gulp.task('sculpin', ['build-sass']);

gulp.task('build-sass', function () {
    return gulp.src('source/sass/style.sass')
        .pipe(sass())
        .pipe(cleanCss())
        .pipe(gulp.dest('output_dev/css/'))
        .pipe(gulp.dest('output_prod/css/'))
});
```
