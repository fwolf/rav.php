<?php

namespace FwolfTest\Rav\Controller;

use Exception;
use Fwolf\Rav\Action\AbstractAction;
use Fwolf\Rav\Action\ActionInterface;
use Fwolf\Rav\Controller\AbstractController;
use Fwolf\Rav\Router\AbstractRouter;
use Fwolf\Rav\Router\Exception\ActionNotFoundException;
use Fwolf\Rav\Router\RouterInterface;
use Fwolf\Wrapper\PHPUnit\TestCase;
use FwolfTest\Rav\Action\ActionDummy;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class AbstractControllerTest extends TestCase
{
    /**
     * @var string
     */
    public static $testOutputException = '';


    /**
     * @param string[] $methods
     * @return  MockObject | AbstractController
     */
    protected function buildMock(array $methods = []): MockObject
    {
        $mock = $this->getMockBuilder(AbstractController::class)
            ->setMethods($methods)
            ->getMockForAbstractClass()
        ;

        return $mock;
    }


    public function testCreateAction()
    {
        $mock = $this->buildMock();
        $action = $mock->createAction(ActionDummy::class);
        $this->assertInstanceOf(ActionDummy::class, $action);
    }


    public function testOutputException()
    {
        self::$testOutputException = '';

        $exception1 = new Exception('error message');

        $mock = $this->buildMock(['outputError', 'getRouter']);
        $mock->method('outputError')
            ->willReturnCallback(function ($msg) {
                AbstractControllerTest::$testOutputException = $msg;

                return $this;
            })
        ;
        $mock->method('getRouter')
            ->willThrowException($exception1)
        ;
        $mock->start();
        $this->assertEquals('error message', self::$testOutputException);


        self::$testOutputException = '';
        $exception2 = new ActionNotFoundException();
        $mock->method('getRouter')
            ->willThrowException($exception2)
        ;
        $mock->start();
        $this->assertEquals('ActionNotFound', self::$testOutputException);
    }


    public function testStart()
    {
        /** @var MockObject | ActionInterface $action */
        $action = $this->getMockBuilder(AbstractAction::class)
            ->setMethods(['start'])
            ->getMockForAbstractClass()
        ;
        $action->expects($this->once())
            ->method('start')
        ;

        /** @var MockObject | RouterInterface $router */
        $router = $this->buildEasyMock(
            AbstractRouter::class,
            ['getActionClass' => 'dummy']
        );

        $mock = $this->buildMock(['createAction']);
        $mock->method('createAction')
            ->willReturn($action)
        ;

        $mock->setRouter($router)
            ->start()
        ;
    }
}
