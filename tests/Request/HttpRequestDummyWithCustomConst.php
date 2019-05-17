<?php

namespace FwolfTest\Rav\Request;

use Fwolf\Rav\Request\HttpRequest;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class HttpRequestDummyWithCustomConst extends HttpRequest
{
    public const ACTION_PARAMETER = 'q';
}
