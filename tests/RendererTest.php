<?php

declare(strict_types=1);

use Conia\Boiler\Exception\LookupException;
use Conia\Core\Config;
use Conia\Cms\Boiler\Renderer;
use Conia\Cms\Boiler\RendererException;
use Conia\Cms\Boiler\Tests\TestCase;
use Conia\Cms\Boiler\Tests\Whitelisted;

uses(TestCase::class);

test('Html (array of template dirs)', function () {
    $renderer = new Renderer(
        $this->factory(),
        $this->templates(),
        ['config' => new Config('boiler')],
        [],
        true,
    );
    $result = $renderer->render('renderer', ['text' => 'numbers', 'arr' => [1, 2, 3]]);

    expect($result)->toBe("<h1>boiler</h1>\n<p>numbers</p><p>1</p><p>2</p><p>3</p>");
});

test('Html (template dir as string)', function () {
    $renderer = new Renderer(
        $this->factory(),
        TestCase::TEMPLATES,
        ['config' => new Config('boiler')],
        [],
        true,
    );
    $result = $renderer->render('renderer', ['text' => 'numbers', 'arr' => [1, 2, 3]]);

    expect($result)->toBe("<h1>boiler</h1>\n<p>numbers</p><p>1</p><p>2</p><p>3</p>");
});

test('Whitelisting', function () {
    $renderer = new Renderer(
        $this->factory(),
        $this->templates(),
        [],
        [Whitelisted::class],
        true,
    );
    $result = $renderer->render('whitelist', ['wl' => new Whitelisted(), 'content' => 'test']);

    expect($result)->toBe('<h1>headline</h1><p>test</p>');
});


test('Content type', function () {
    $renderer = new Renderer($this->factory(), $this->templates());
    expect($renderer->contentType())->toBe('text/html');

    $renderer = new Renderer($this->factory(), $this->templates(), contentType: 'text/xhtml');
    expect($renderer->contentType())->toBe('text/xhtml');
});

test('Template missing', function () {
    (new Renderer($this->factory(), $this->templates()))->render('missing', []);
})->throws(LookupException::class);

test('Template dirs missing', function () {
    (new Renderer($this->factory(), []))->render( 'renderer', []);
})->throws(RendererException::class);
