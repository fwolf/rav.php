<?php

namespace FwolfTest\Rav\View;

use Fwolf\Rav\View\AbstractHttpView;
use Fwolf\Rav\View\ViewDto;
use Fwolf\Wrapper\PHPUnit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class AbstractHttpViewTest extends TestCase
{
    /**
     * @var array
     */
    public static $headers = [];


    /**
     * @param string[] $methods
     * @return  MockObject | AbstractHttpView
     */
    protected function buildMock(array $methods = null): MockObject
    {
        $mock = $this->getMockBuilder(AbstractHttpView::class)
            ->setMethods($methods)
            ->getMockForAbstractClass()
        ;

        return $mock;
    }


    public function testOutputHttpHeaders()
    {
        $mock = $this->buildMock(['getOutput']);

        self::$headers = [];
        $mock->output();
        $this->assertSame([], self::$headers);


        self::$headers = [];
        $dto = (new ViewDto())
            ->setHeader('a', 'aa')
            ->setHeader('b', 'bb', false)
            ->setHeader('c', 'cc', false, 404)
        ;
        $mock->setDto($dto)->output();
        $expected = [
            ['aa', true, 200],
            ['bb', false, 200],
            ['cc', false, 404],
        ];
        $this->assertSame($expected, self::$headers);
    }
}


namespace Fwolf\Rav\View;

/**
 * @param      $header
 * @param bool $replace
 * @param int  $responseCode
 */
function header($header, $replace = true, $responseCode = 200)
{
    /** @noinspection PhpFullyQualifiedNameUsageInspection */
    \FwolfTest\Rav\View\AbstractHttpViewTest::$headers[] =
        [$header, $replace, $responseCode];
}
