<?php

namespace FwolfTest\Rav\Router;

use Fwolf\Rav\Router\AbstractRouter;
use Fwolf\Wrapper\PHPUnit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class AbstractRouterTest extends TestCase
{
    /**
     * @param string[] $methods
     * @return  MockObject | AbstractRouter
     */
    protected function buildMock(array $methods = []): MockObject
    {
        $mock = $this->getMockBuilder(AbstractRouter::class)
            ->setMethods($methods)
            ->getMockForAbstractClass()
        ;

        return $mock;
    }


    public function testAccessors()
    {
        $mock = $this->buildMock();

        $mock->setNamespacePrefix('dummy prefix');
        $this->assertEquals('dummy prefix', $mock->getNamespacePrefix());
    }
}
