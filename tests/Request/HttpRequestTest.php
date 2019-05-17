<?php

namespace FwolfTest\Rav\Request;

use Fwlib\Util\Common\HttpUtil;
use Fwolf\Rav\Request\HttpRequest;
use Fwolf\Wrapper\PHPUnit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class HttpRequestTest extends TestCase
{
    /**
     * @param string[] $methods
     * @return  MockObject | HttpRequest
     */
    protected function buildMock(array $methods = null): MockObject
    {
        $mock = $this->getMockBuilder(HttpRequest::class)
            ->setMethods($methods)
            ->getMock()
        ;

        return $mock;
    }


    public function testAccessors()
    {
        /** @var MockObject | HttpUtil $httpUtil */
        $httpUtil = $this->getMockBuilder(HttpUtil::class)
            ->setMethods(['getGet'])
            ->getMock()
        ;
        $httpUtil->method('getGet')
            ->willReturnOnConsecutiveCalls('dummyAction', 'dummyModule')
        ;

        $mock = $this->buildMock(['getHttpUtil']);
        $mock->method('getHttpUtil')
            ->willReturn($httpUtil)
        ;

        $this->assertEquals('dummyAction', $mock->getAction());
        $this->assertEquals('dummyModule', $mock->getModule());

        $this->assertEquals(
            HttpRequest::ACTION_PARAMETER,
            $mock->getActionParameter()
        );

        $this->assertEquals(
            HttpRequest::MODULE_PARAMETER,
            $mock->getModuleParameter()
        );
    }


    public function testCustomConst()
    {
        /** @var HttpRequestDummyWithCustomConst $mock */
        $mock = $this->getMockBuilder(HttpRequestDummyWithCustomConst::class)
            ->setMethods(null)
            ->getMock()
        ;

        $this->assertEquals(
            HttpRequestDummyWithCustomConst::ACTION_PARAMETER,
            $mock->getActionParameter()
        );
    }


    public function testGetHttpUtil()
    {
        $mock = $this->buildMock();

        $httpUtil = $this->reflectionCall($mock, 'getHttpUtil');
        $this->assertInstanceOf(HttpUtil::class, $httpUtil);
    }
}
