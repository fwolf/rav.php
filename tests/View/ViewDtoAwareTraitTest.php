<?php

namespace FwolfTest\Rav\View;

use Fwolf\Rav\View\ViewDto;
use Fwolf\Rav\View\ViewDtoAwareTrait;
use Fwolf\Wrapper\PHPUnit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class ViewDtoAwareTraitTest extends TestCase
{
    /**
     * @param string[] $methods
     * @return  MockObject | ViewDtoAwareTrait
     */
    protected function buildMock(array $methods = null): MockObject
    {
        $mock = $this->getMockBuilder(ViewDtoAwareTrait::class)
            ->setMethods($methods)
            ->getMockForTrait()
        ;

        return $mock;
    }


    public function testAccessors()
    {
        $mock = $this->buildMock();

        $request = new ViewDto();
        $mock->setViewDto($request);
        $this->assertInstanceOf(ViewDto::class, $mock->getViewDto());

        $this->reflectionSet($mock, 'viewDto', null);
        $this->assertInstanceOf(ViewDto::class, $mock->getViewDto());
    }
}
