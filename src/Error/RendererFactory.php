<?php

declare(strict_types=1);

namespace Duon\Cms\Boiler\Error;

use Duon\Error\Renderer as RendererInterface;

final class RendererFactory
{
	public function __construct(
		private string|array $dirs,
		private array $context = [],
		private array $whitelist = [],
		private bool $autoescape = true,
	) {}

	public function withTemplate(string $template): RendererInterface
	{
		return new Renderer(
			$template,
			$this->dirs,
			$this->context,
			$this->whitelist,
			$this->autoescape,
		);
	}
}
