<?php

declare(strict_types=1);

namespace Duon\Cms\Boiler;

use Duon\Boiler\Engine;
use Duon\Cms\Renderer as RendererInterface;
use Override;

/**
 * @psalm-api
 *
 * @psalm-import-type DirsInput from \Duon\Boiler\Engine
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
	#[Override]
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
		return $this->autoescape
			? Engine::create($dirs, $this->defaults, $this->whitelist)
			: Engine::unescaped($dirs, $this->defaults, $this->whitelist);
	}

	#[Override]
	public function contentType(): string
	{
		return $this->contentType;
	}
}
