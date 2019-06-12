<?php

namespace FwolfTest\Rav\Request;

use Fwolf\Rav\Request\Request;
use Fwolf\Rav\Request\RequestAwareTrait;
use Fwolf\Wrapper\PHPUnit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class RequestAwareTraitTest extends TestCase
{
    /**
     * @param string[] $methods
     * @return  MockObject | RequestAwareTrait
     */
    protected function buildMock(array $methods = null): MockObject
    {
        $mock = $this->getMockBuilder(RequestAwareTrait::class)
            ->setMethods($methods)
            ->getMockForTrait()
        ;

        return $mock;
    }


    public function testAccessors()
    {
        $mock = $this->buildMock();

        $request = new Request();
        $mock->setRequest($request);
        $this->assertInstanceOf(Request::class, $mock->getRequest());

        $this->reflectionSet($mock, 'request', null);
        $this->assertInstanceOf(Request::class, $mock->getRequest());
    }
}
