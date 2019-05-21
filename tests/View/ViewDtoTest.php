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

        $mock->setHeaders('foo', 'bar');
        $this->assertEquals('bar', $mock->getHeader('foo'));

        $this->assertNull($mock->getHeader('not-exist-key'));

        $mock->setMimeHeader('text/html');
        $this->assertEquals('text/html', $mock->getMimeHeader());
    }


    public function testGetFail()
    {
        $mock = $this->buildMock();

        $this->expectException(ViewDataKeyNotFoundException::class);

        $mock->get('notExistKey');
    }
}
