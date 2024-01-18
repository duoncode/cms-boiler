<?php

declare(strict_types=1);

use Conia\Boiler\Exception\LookupException;
use Conia\Cms\Boiler\Renderer;
use Conia\Cms\Boiler\RendererException;
use Conia\Cms\Boiler\Tests\TestCase;
use Conia\Cms\Boiler\Tests\Whitelisted;
use Conia\Core\Config;

class RendererTest extends TestCase
{
    public function testHtmlArrayOfTemplateDirs(): void
    {
        $renderer = new Renderer(
            $this->factory(),
            $this->templates(),
            ['config' => new Config('boiler')],
            [],
            true,
        );
        $result = $renderer->render('renderer', ['text' => 'numbers', 'arr' => [1, 2, 3]]);

        $this->assertEquals("<h1>boiler</h1>\n<p>numbers</p><p>1</p><p>2</p><p>3</p>", $result);
    }

    public function testHtmlTemplateDirAsString(): void
    {
        $renderer = new Renderer(
            $this->factory(),
            TestCase::TEMPLATES,
            ['config' => new Config('boiler')],
            [],
            true,
        );
        $result = $renderer->render('renderer', ['text' => 'numbers', 'arr' => [1, 2, 3]]);

        $this->assertEquals("<h1>boiler</h1>\n<p>numbers</p><p>1</p><p>2</p><p>3</p>", $result);
    }

    public function testWhitelisting(): void
    {
        $renderer = new Renderer(
            $this->factory(),
            $this->templates(),
            [],
            [Whitelisted::class],
            true,
        );
        $result = $renderer->render('whitelist', ['wl' => new Whitelisted(), 'content' => 'test']);

        $this->assertEquals('<h1>headline</h1><p>test</p>', $result);
    }

    public function testContentType(): void
    {
        $renderer = new Renderer($this->factory(), $this->templates());
        $this->assertEquals('text/html', $renderer->contentType());

        $renderer = new Renderer($this->factory(), $this->templates(), contentType: 'text/xhtml');
        $this->assertEquals('text/xhtml', $renderer->contentType());
    }

    public function testTemplateMissing(): void
    {
        $this->throws(LookupException::class);

        (new Renderer($this->factory(), $this->templates()))->render('missing', []);
    }

    public function testTemplateDirsMissing(): void
    {
        $this->throws(RendererException::class);

        (new Renderer($this->factory(), []))->render('renderer', []);
    }
}
