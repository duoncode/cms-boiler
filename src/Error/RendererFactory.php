<?php

declare(strict_types=1);

namespace Duon\Cms\Boiler\Error;

use Duon\Error\Renderer as RendererInterface;

class RendererFactory
{
	public function __construct(
		protected string|array $dirs,
		protected array $context = [],
		protected array $whitelist = [],
		protected bool $autoescape = true,
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
