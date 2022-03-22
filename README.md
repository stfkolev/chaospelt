# Chaospelt 0.1

[![Latest Stable Version](https://img.shields.io/packagist/v/stfkolev/chaospelt.svg?style=flat-square)](https://packagist.org/packages/stfkolev/chaospelt) 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/stfkolev/chaospelt/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/stfkolev/chaospelt/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/stfkolev/chaospelt/badges/build.png?b=master)](https://scrutinizer-ci.com/g/stfkolev/chaospelt/build-status/master)
[![License](https://img.shields.io/badge/license-BSD_3_Clause-brightgreen.svg?style=flat-square)](LICENSE) 
[![Code Coverage](https://scrutinizer-ci.com/g/stfkolev/chaospelt/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/stfkolev/chaospelt/?branch=master)
[![StyleCI](https://github.styleci.io/repos/472332711/shield?branch=master)](https://github.styleci.io/repos/472332711?branch=master)

## Purpose

This a "foundation" package. Its purpose is to help people develop Wordpress plugins quicker and easier in a more modern way. It provides some features that provide cleaner code structuring and overall quality.

This package can prevent some headaches, but cannot replace bad code habits, you'll still need a real . 

## Features

* Easier to use hooks declarations
* Code separation into modules
* PSR-4 Autoloading


## Installation

### Compatible with

- PHP 7.4 and above
- Wordpress 5.4 and above

### Installing

Create an empty composer project and require the Chaospelt package using [Composer](https://getcomposer.org/doc/01-basic-usage.md):

```
composer require stfkolev/chaospelt
```

Then, create a file with the main plugin class and extend the Chaospelt\Kernel\Plugin class:

```php
<?php

namespace Lab;

use Chaospelt\Kernel\Plugin;

class LabPlugin extends Plugin {
    public function __construct() {
        parent::__construct(PLUGIN_FILE);
    }
}
```
**Note:** Be sure to follow the [Wordpress Development Guide](https://developer.wordpress.org/plugins/intro/) and pass the plugin file's path into the parent constructor. It is important, as it uses the path for the auto-registration of the hooks.
**Note 2:** You can create your folder structure however you want. This is just a sample code onto how to use the foundation.


## TODO

- Database abstraction
- Validator
- Requests Handler
- Routing
- Tests, tests, tests.

## License

Chaospelt is licensed under the BSD 3-Clause License - see the `LICENSE` file for details

## Contributing

Pull requests and issues are more than welcome.
