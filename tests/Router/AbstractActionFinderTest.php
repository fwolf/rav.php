<?php

namespace FwolfTest\Rav\Router;

use Fwolf\Rav\Router\AbstractActionFinder;
use Fwolf\Wrapper\PHPUnit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class AbstractActionFinderTest extends TestCase
{
    /**
     * @param string[] $methods
     * @return  MockObject | AbstractActionFinder
     */
    protected function buildMock(array $methods = []): MockObject
    {
        $mock = $this->getMockBuilder(AbstractActionFinder::class)
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
