Chuck Boiler
============

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE.md)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/coniadev/chuck-boiler.svg)](https://scrutinizer-ci.com/g/coniadev/chuck-boiler/code-structure)
[![Psalm coverage](https://shepherd.dev/github/coniadev/chuck-boiler/coverage.svg?)](https://shepherd.dev/github/coniadev/chuck-boiler)
[![Psalm level](https://shepherd.dev/github/coniadev/chuck-boiler/level.svg?)](https://conia.dev/chuck-boiler)
[![Quality Score](https://img.shields.io/scrutinizer/g/coniadev/chuck-boiler.svg)](https://scrutinizer-ci.com/g/coniadev/chuck-boiler)

Allows to use [Boiler](https://conia.dev/boiler) templates in [Chuck](https://conia.dev/chuck).

```php
use Conia\Renderer\Boiler\Renderer;
use Conia\Chuck\{App, Config};

$app = App::create(new Config('app'));

$app->renderer('template', Renderer::class)->args(function () {
    return [
        'default' => 'context',
        'variables' => 13,
    ];
});
```
