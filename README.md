# FiveOrbs CMS Boiler Renderer

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE.md)
[![Psalm coverage](https://shepherd.dev/github/fiveorbs/cms-boiler/coverage.svg?)](https://shepherd.dev/github/fiveorbs/cms-boiler)
[![Psalm level](https://shepherd.dev/github/fiveorbs/cms-boiler/level.svg?)](https://fiveorbs.dev/cms-boiler)

Allows to use [Boiler](https://fiveorbs.dev/boiler) templates in the [FiveOrbs CMS](https://fiveorbs.dev/cms).

```php
use FiveOrbs\Cms\Cms;
use FiveOrbs\Cms\Boiler\Renderer;
use FiveOrbs\Core\App;

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
