<?php

declare(strict_types=1);

namespace Duon\Cms\Boiler\Error;

use Duon\Boiler\Engine;
use Duon\Core\Exception\HttpError;
use Duon\Error\Renderer as RendererInterface;
use Psr\Http\Message\ResponseFactoryInterface as ResponseFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Throwable;

class Renderer implements RendererInterface
{
	public function __construct(
		protected string $template,
		protected string|array $dirs,
		protected array $context = [],
		protected array $whitelist = [],
		protected bool $autoescape = true,
		protected string $contentType = 'text/html',
	) {}

	public function render(Throwable $exception, ResponseFactory $factory, ?Request $request, bool $debug): Response
	{
		$payload = null;

		if ($exception instanceof HttpError) {
			$payload = $exception->payload();
			$request = $exception->request() ?: $request;
		}
		$dirs = $this->dirs;
		$engine = $this->createEngine($dirs);
		$response = $factory->createResponse($exception->getCode());

		if ($request && $this->isJsonOnlyRequest($request)) {
			$response = $response->withHeader('Content-Type', 'application/json');
			$response->getBody()->write(json_encode($payload) ?? '{}');
		} else {
			$response->getBody()->write($engine->render($this->template, array_merge($this->context, [
				'request' => $request,
				'exception' => $exception,
				'payload' => $payload,
			])));
		}

		return $response;
	}

	protected function createEngine(string|array $dirs): Engine
	{
		return new Engine($dirs, $this->autoescape, [], $this->whitelist);
	}

	protected function isJsonOnlyRequest(Request $request): bool
	{
		// Split the Accept header into individual media types
		$acceptedTypes = array_map('trim', explode(',', $request->getHeaderLine('Accept')));

		if (!empty($acceptedTypes)) {
			foreach ($acceptedTypes as $type) {
				// Remove quality values if present
				$mediaType = trim(explode(';', $type)[0]);

				if ($mediaType !== 'application/json') {
					return false;
				}
			}
		}

		return true;
	}
}
