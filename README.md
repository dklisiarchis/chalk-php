## About

Chalk is a small PHP library for adding ANSI colors and other text transformations to CLI text output.

[![Build & Test](https://github.com/dklisiarchis/chalk-php/actions/workflows/php.yml/badge.svg)](https://github.com/dklisiarchis/chalk-php/actions/workflows/php.yml)
 [![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%208.1-8892BF.svg?style=flat-square)](https://php.net/)
[![Latest Stable Version](http://poser.pugx.org/dklis/chalk-php/v)](https://packagist.org/packages/dklis/chalk-php)
[![License](http://poser.pugx.org/phpunit/phpunit/license)](https://packagist.org/packages/phpunit/phpunit)

## Requirements

Chalk requires PHP version 8.1 or greater.

## Installation

The easiest way to get started with Chalk is through composer:
```
# Install as dependency
composer require "dklis/chalk-php"
```


## Usage
```php
<?php
use Dklis\Chalk\Chalk;

// ...

// Foreground color
$redMessage = Chalk::red('A red message');

// Background color
$redBgMessage = Chalk::redBG('A message with red background');

// Transformations
$bold = Chalk::bold('A bold message');
$underline = Chalk::underline('An underlined message');


// Multiple transformations
$multiTransform = Chalk::transform('A message', 'blue', 'redBG', 'underscore', 'bold')

```

## Default colors
| Colors  | Code |
|---------|------|
| Red     | 31m  |
| Blue    | 34m  |
 | Green   | 32m  |
 | Black   | 30m  | 
| Orange  | 33m  |
 | Magenta | 35m  |
| Cyan    | 36m  |
| Gray    | 37m  |


## Default transformations
| Transformation | Code |
|----------------|------|
| Bold           | 1m   |
| Underline      | 4m   |


## Adding your own
To use a custom color palette, simply create a string backed Enum implementing `\Dklis\Chalk\Contracts\ColorPaletteInterface`
and call the `Chalk::create` function to create your messages.

## Issues
Bug reports and feature requests can be submitted on the [Github Issue Tracker](https://github.com/dklisiarchis/chalk-php/issues).