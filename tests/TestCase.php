<?php

declare(strict_types=1);

namespace Conia\Cms\Boiler\Tests;

use Conia\Core\Factory\Nyholm;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class TestCase extends BaseTestCase
{
    public const TEMPLATES = __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function factory(): Nyholm
    {
        return new Nyholm();
    }

    public function templates(): array
    {
        return [self::TEMPLATES];
    }
}
