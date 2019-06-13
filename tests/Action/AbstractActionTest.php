<?php

namespace FwolfTest\Rav\Action;

use Fwolf\Rav\Action\AbstractAction;
use Fwolf\Rav\View\AbstractView;
use Fwolf\Wrapper\PHPUnit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use stdClass;
use TypeError;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class AbstractActionTest extends TestCase
{
    /**
     * @param string[] $methods
     * @return  MockObject | AbstractAction
     */
    protected function buildMock(array $methods = []): MockObject
    {
        $mock = $this->getMockBuilder(AbstractAction::class)
            ->setMethods($methods)
            ->getMockForAbstractClass()
        ;

        return $mock;
    }


    public function testAccessors()
    {
        $mock = $this->buildMock();

        $this->assertEmpty($this->reflectionCall($mock, 'getTitle'));
        $this->assertEmpty($this->reflectionCall($mock, 'getViewClass'));
        $this->assertEmpty($this->reflectionCall($mock, 'getViewTemplate'));
    }


    public function testInitView()
    {
        $mock = $this->buildMock();

        $this->expectException(TypeError::class);
        $viewClass = stdClass::class;
        $this->reflectionCall($mock, 'initView', [$viewClass]);
    }


    public function testOutput()
    {
        $view = $this->getMockBuilder(AbstractView::class)
            ->setMethods(['output'])
            ->getMockForAbstractClass()
        ;
        $view->expects($this->once())
            ->method('output')
        ;

        $methods = [
            'initView',
            'getViewClass',
            'getTitle',
            'getViewTemplate',
            'getViewDto',
        ];
        $mock = $this->buildMock($methods);
        $mock->method('initView')
            ->willReturn($view)
        ;
        foreach ($methods as $method) {
            $mock->expects($this->once())
                ->method($method)
            ;
        }

        $mock->output();
    }


    public function testSetViewData()
    {
        $mock = $this->buildMock();

        $this->reflectionCall($mock, 'setViewData', ['key', 'val']);
        $viewDto = $this->reflectionCall($mock, 'getViewDto');
        $this->assertEquals('val', $viewDto->get('key'));
    }


    public function testStart()
    {
        $methods = [
            'process',
            'output',
        ];
        $mock = $this->buildMock($methods);
        foreach ($methods as $method) {
            $mock->expects($this->once())
                ->method($method)
                ->willReturnSelf()
            ;
        }

        $mock->start();
    }
}
