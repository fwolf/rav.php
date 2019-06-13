<?php

namespace FwolfTest\Rav\View;

use Fwolf\Rav\View\AbstractView;
use Fwolf\Rav\View\ViewDto;
use Fwolf\Wrapper\PHPUnit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class AbstractViewTest extends TestCase
{
    /**
     * @param string[] $methods
     * @return  MockObject | AbstractView
     */
    protected function buildMock(array $methods = null): MockObject
    {
        $mock = $this->getMockBuilder(AbstractView::class)
            ->setMethods($methods)
            ->getMockForAbstractClass()
        ;

        return $mock;
    }


    public function testAccessors()
    {
        /** @var MockObject | AbstractView $mock */
        $mock = $this->getMockBuilder(AbstractView::class)
            ->getMockForAbstractClass()
        ;

        $mock->setTitle('dummy title');
        $this->assertEquals('dummy title', $mock->getTitle());

        $dto = $mock->getViewDto();
        $this->assertTrue($dto->isEmpty());
        $mock->setViewDto($dto);
        $this->assertInstanceOf(ViewDto::class, $mock->getViewDto());
    }


    public function testOutput()
    {
        $mock = $this->buildMock(['getOutput']);
        $mock->method('getOutput')
            ->willReturn('dummy output')
        ;

        $this->expectOutputString('dummy output');

        $mock->output();
    }
}
