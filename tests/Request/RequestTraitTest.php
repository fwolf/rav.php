<?php

namespace FwolfTest\Rav\Request;

use Fwolf\Rav\Request\Request;
use Fwolf\Rav\Request\RequestTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class RequestTraitTest extends TestCase
{
    /**
     * @param string[] $methods
     * @return  MockObject | RequestTrait
     */
    protected function buildMock(array $methods = null): MockObject
    {
        $mock = $this->getMockBuilder(Request::class)
            ->setMethods($methods)
            ->getMock()
        ;

        return $mock;
    }


    public function testAccessors()
    {
        $mock = $this->buildMock();

        $mock->setAction('dummyAction');
        $this->assertEquals('dummyAction', $mock->getAction());

        $mock->setModule('dummyModule');
        $this->assertEquals('dummyModule', $mock->getModule());
    }
}
