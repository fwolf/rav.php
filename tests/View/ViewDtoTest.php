<?php

namespace FwolfTest\Rav\View;

use Fwolf\Rav\View\Exception\ViewDataKeyNotFoundException;
use Fwolf\Rav\View\ViewDto;
use Fwolf\Wrapper\PHPUnit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class ViewDtoTest extends TestCase
{
    /**
     * @param string[] $methods
     * @return  MockObject | ViewDto
     */
    protected function buildMock(array $methods = null): MockObject
    {
        $mock = $this->getMockBuilder(ViewDto::class)
            ->setMethods($methods)
            ->getMock()
        ;

        return $mock;
    }


    public function testAccessors()
    {
        $mock = $this->buildMock();

        $mock->set('foo', 'bar');
        $this->assertEquals('bar', $mock->get('foo'));
    }


    public function testGetFail()
    {
        $mock = $this->buildMock();

        $this->expectException(ViewDataKeyNotFoundException::class);

        $mock->get('notExistKey');
    }


    public function testHeaderAccessors()
    {
        $mock = $this->buildMock();

        $mock->setHeaders(['dummy']);
        $this->assertSame(['dummy'], $mock->getHeaders());

        $mock->setHeader('foo', 'bar');
        $this->assertSame(['bar'], $mock->getHeader('foo'));

        $mock->setHeader('foo', 'bar', false);
        $this->assertSame(['bar', false], $mock->getHeader('foo'));

        $mock->setHeader('foo', 'bar', true, 404);
        $this->assertSame(['bar', true, 404], $mock->getHeader('foo'));

        $this->assertEmpty($mock->getHeader('not-exist-key'));

        $mock->setContentTypeHeader('text/html');
        $this->assertEquals(
            'Content-Type: text/html',
            $mock->getContentTypeHeader()
        );
    }
}
