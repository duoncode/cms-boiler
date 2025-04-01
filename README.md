# Duon CMS Boiler Renderer

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE.md)
[![Psalm coverage](https://shepherd.dev/github/duoncode/cms-boiler/coverage.svg?)](https://shepherd.dev/github/duoncode/cms-boiler)
[![Psalm level](https://shepherd.dev/github/duoncode/cms-boiler/level.svg?)](https://duoncode.dev/cms-boiler)

Allows to use [Boiler](https://duon.sh/boiler) templates in the [Duon CMS](https://duon.sh/cms).

```php
use Duon\Cms\Cms;
use Duon\Cms\Boiler\Renderer;
use Duon\Core\App;

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
