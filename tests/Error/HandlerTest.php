<?php

declare(strict_types=1);

namespace Duon\Cms\Boiler\Tests\Error;

use Duon\Cms\Boiler\Error\Handler;
use Duon\Cms\Boiler\Tests\TestCase;
use Duon\Error\Handler as ErrorHandler;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use Psr\Log\NullLogger;

class HandlerTest extends TestCase
{
	public function testViewsMethodReturnsInstance(): void
	{
		$handler = new Handler(
			root: __DIR__ . '/../',
			logger: new NullLogger(),
			factory: $this->factory(),
		);

		$result = $handler->views('templates');

		$this->assertSame($handler, $result);
	}

	public function testWhitelistMergesByDefault(): void
	{
		$handler = new Handler(
			root: __DIR__ . '/../',
			logger: new NullLogger(),
			factory: $this->factory(),
		);

		// Add to whitelist and verify method returns instance
		$result = $handler->whitelist([self::class]);

		$this->assertSame($handler, $result);
	}

	public function testWhitelistCanReplace(): void
	{
		$handler = new Handler(
			root: __DIR__ . '/../',
			logger: new NullLogger(),
			factory: $this->factory(),
		);

		// Replace whitelist entirely
		$result = $handler->whitelist([self::class], replace: true);

		$this->assertSame($handler, $result);
	}
}
