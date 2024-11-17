<?php

declare(strict_types=1);

namespace FiveOrbs\Cms\Boiler\Tests;

class Whitelisted extends WhitelistBase
{
	public function __toString(): string
	{
		return '<h1>headline</h1>';
	}

	public function paragraph(string $content): string
	{
		return "<p>{$content}</p>";
	}
}
