Chuck Boiler
============

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
