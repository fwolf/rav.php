<?php

namespace FwolfTest\Rav\Router;

use Fwolf\Rav\Request\Request;
use Fwolf\Rav\Router\ActionFinderByNamespace;
use Fwolf\Rav\Router\Exception\ActionNotFoundException;
use Fwolf\Rav\Router\Exception\ModuleOrActionEmptyException;
use Fwolf\Wrapper\PHPUnit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class ActionFinderByNamespaceTest extends TestCase
{
    /**
     * @param string[] $methods
     * @return  MockObject | ActionFinderByNamespace
     */
    protected function buildMock(array $methods = null): MockObject
    {
        $mock = $this->getMockBuilder(ActionFinderByNamespace::class)
            ->setMethods($methods)
            ->getMock()
        ;

        return $mock;
    }


    public function testGetActionClass()
    {
        $request = (new Request())
            ->setModule('router')
            ->setAction('action-finder-by-namespace-test')
        ;

        $mock = $this->buildMock();
        $mock->setRequest($request)
            ->setNamespacePrefix('FwolfTest\\Rav\\')
        ;
        $this->assertEquals(
            ActionFinderByNamespaceTest::class,
            $mock->getActionClass()
        );

        $request->setAction('actionFinderByNamespaceTest');
        $mock->setRequest($request);
        $this->assertEquals(
            ActionFinderByNamespaceTest::class,
            $mock->getActionClass()
        );
    }


    public function testGetActionClassFailWithEmptyModule()
    {
        $this->expectException(ModuleOrActionEmptyException::class);

        $request = (new Request())->setModule('');

        $mock = ($this->buildMock())
            ->setRequest($request);

        $mock->getActionClass();
    }


    public function testGetActionClassFailWithNotFound()
    {
        $this->expectException(ActionNotFoundException::class);

        $request = (new Request())
            ->setModule('router')
            ->setAction('not-exists')
        ;

        $mock = ($this->buildMock())
            ->setRequest($request);

        $mock->getActionClass();
    }
}
