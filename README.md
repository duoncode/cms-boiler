Conia CMS Boiler Renderer
=========================

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE.md)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/coniadev/cms-boiler.svg)](https://scrutinizer-ci.com/g/coniadev/cms-boiler/code-structure)
[![Psalm coverage](https://shepherd.dev/github/coniadev/cms-boiler/coverage.svg?)](https://shepherd.dev/github/coniadev/cms-boiler)
[![Psalm level](https://shepherd.dev/github/coniadev/cms-boiler/level.svg?)](https://conia.dev/cms-boiler)
[![Quality Score](https://img.shields.io/scrutinizer/g/coniadev/cms-boiler.svg)](https://scrutinizer-ci.com/g/coniadev/cms-boiler)

Allows to use [Boiler](https://conia.dev/boiler) templates in [Conia CMS](https://conia.dev/cms).

```php
use Conia\Cms\Cms;
use Conia\Cms\Boiler\Renderer;
use Conia\Core\App;

$cms = new Cms();
$cms->renderer('template', Renderer::class)->args(function () {
    return [
        'default' => 'context',
        'variables' => 13,
    ];
});

$app = App::create();
$app->load($cms);
```
