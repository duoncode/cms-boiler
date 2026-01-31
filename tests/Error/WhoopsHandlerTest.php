<?php

declare(strict_types=1);

namespace Duon\Cms\Boiler\Tests\Error;

use Duon\Cms\Boiler\Error\WhoopsHandler;
use Duon\Cms\Boiler\Tests\TestCase;
use Exception;
use Psr\Http\Message\ResponseInterface;

class WhoopsHandlerTest extends TestCase
{
	public function testHandleReturns500Response(): void
	{
		$handler = new WhoopsHandler();
		$exception = new Exception('Test error');

		$response = $handler->handle($exception, $this->factory()->responseFactory());

		$this->assertInstanceOf(ResponseInterface::class, $response);
		$this->assertEquals(500, $response->getStatusCode());
		$this->assertEquals('text/html', $response->getHeaderLine('Content-type'));
	}
}
