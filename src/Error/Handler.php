<?php

declare(strict_types=1);

namespace Duon\Cms\Boiler\Error;

use Duon\Cms\Config;
use Duon\Cms\Finder\Finder;
use Duon\Cms\Locale;
use Duon\Cms\Locales;
use Duon\Cms\Node\Node;
use Duon\Core\Exception\HttpError;
use Duon\Core\Factory;
use Duon\Core\Request;
use Duon\Error\Handler as ErrorHandler;
use Psr\Log\LoggerInterface as Logger;

use function Duon\Core\env;

final class Handler
{
	private string $views;
	private array $whitelist = [
		Node::class,
		Finder::class,
		Locales::class,
		Locale::class,
		Config::class,
		Request::class,
	];

	public function __construct(private string $root, private Logger $logger, private Factory $factory)
	{
		$this->views = "{$this->root}/views";
	}

	public function views(string $views): self
	{
		$this->views = "{$this->root}/{$views}";

		return $this;
	}

	public function whitelist(array $whitelist, bool $replace = false): self
	{
		if ($replace) {
			$this->whitelist = $whitelist;
		} else {
			$this->whitelist = array_merge($this->whitelist, $whitelist);
		}

		return $this;
	}

	public function create(): ErrorHandler
	{
		$rendererFactory = new RendererFactory(
			dirs: $this->views,
			autoescape: true,
			context: [
				'debug' => env('CMS_DEBUG'),
				'env' => env('CMS_ENV'),
			],
			whitelist: $this->whitelist,
		);
		$handler = new ErrorHandler($this->factory->responseFactory(), env('CMS_DEBUG'));
		$handler->logger($this->logger);
		$handler->renderer($rendererFactory->withTemplate('http-error'), HttpError::class);
		$handler->renderer($rendererFactory->withTemplate('http-server-error'));

		if (env('CMS_DEBUG')) {
			$handler->debugHandler(new WhoopsHandler());
		}

		return $handler;
	}
}
