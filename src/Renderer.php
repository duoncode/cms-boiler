<?php

declare(strict_types=1);

namespace FiveOrbs\Cms\Boiler;

use FiveOrbs\Boiler\Engine;
use FiveOrbs\Cms\Renderer as RendererInterface;

/**
 * @psalm-api
 *
 * @psalm-import-type DirsInput from \FiveOrbs\Boiler\Engine
 */
class Renderer implements RendererInterface
{
	/**
	 * @param DirsInput $dirs
	 * @param list<class-string> $whitelist
	 */
	public function __construct(
		protected string|array $dirs,
		protected array $defaults = [],
		protected array $whitelist = [],
		protected bool $autoescape = true,
		protected string $contentType = 'text/html',
	) {}

	/** @param non-empty-string $id */
	public function render(string $id, array $context): string
	{
		$dirs = $this->dirs;

		if (count((array) $dirs) === 0) {
			throw new RendererException('Provide at least one template directory');
		}

		$engine = $this->createEngine($dirs);

		return $engine->render($id, $context);
	}

	/** @param DirsInput $dirs */
	protected function createEngine(string|array $dirs): Engine
	{
		return new Engine($dirs, $this->autoescape, $this->defaults, $this->whitelist);
	}

	public function contentType(): string
	{
		return $this->contentType;
	}
}
