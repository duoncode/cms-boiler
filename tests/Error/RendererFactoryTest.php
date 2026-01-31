<?php

declare(strict_types=1);

namespace Duon\Cms\Boiler\Tests\Error;

use Duon\Cms\Boiler\Error\Renderer;
use Duon\Cms\Boiler\Error\RendererFactory;
use Duon\Cms\Boiler\Tests\TestCase;

class RendererFactoryTest extends TestCase
{
	public function testWithTemplateCreatesRenderer(): void
	{
		$factory = new RendererFactory(
			dirs: $this->templates(),
			context: ['foo' => 'bar'],
			whitelist: [],
			autoescape: true,
		);

		$renderer = $factory->withTemplate('error');

		$this->assertInstanceOf(Renderer::class, $renderer);
	}
}
