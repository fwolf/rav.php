<?php

namespace FwolfTest\Rav\View;

use Fwolf\Rav\View\DataDto;
use Fwolf\Rav\View\Exception\DataKeyNotFoundException;
use Fwolf\Wrapper\PHPUnit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class DataDtoTest extends TestCase
{
    /**
     * @param string[] $methods
     * @return  MockObject | DataDto
     */
    protected function buildMock(array $methods = null): MockObject
    {
        $mock = $this->getMockBuilder(DataDto::class)
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

        $this->expectException(DataKeyNotFoundException::class);

        $mock->get('notExistKey');
    }
}
