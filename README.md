# Duon CMS Boiler Renderer

<!-- prettier-ignore-start -->
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE.md)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/b4597ce87c04453ba7767d3bdc6acdb4)](https://app.codacy.com/gh/duonrun/cms-boiler/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_grade)
[![Codacy Badge](https://app.codacy.com/project/badge/Coverage/b4597ce87c04453ba7767d3bdc6acdb4)](https://app.codacy.com/gh/duonrun/cms-boiler/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_coverage)
[![Psalm level](https://shepherd.dev/github/duonrun/cms-boiler/level.svg?)](https://duonrun.dev/cms-boiler)
[![Psalm coverage](https://shepherd.dev/github/duonrun/cms-boiler/coverage.svg?)](https://shepherd.dev/github/duonrun/cms-boiler)
<!-- prettier-ignore-end -->

Allows to use [Boiler](https://duon.sh/boiler) templates in the [Duon CMS](https://duon.sh/cms).

```php
use Duon\Cms\Cms;
use Duon\Cms\Boiler\Renderer;
use Duon\Core\App;

$cms = new Cms();
$cms->renderer('template', Renderer::class)->args(
    dirs: __DIR__ . '/templates',
    defaults: ['siteName' => 'My Site'],
);

$app = App::create();
$app->load($cms);
```

## License

This project is licensed under the [MIT license](LICENSE.md).
