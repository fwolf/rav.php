<?php

namespace Fwolf\Rav\Request;

/**
 * Request informer for HTTP project
 *
 * {@inheritDoc}
 *
 * @copyright   Copyright 2015-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
interface HttpRequestInterface extends RequestInterface
{
    public function getActionParameter(): string;


    public function getModuleParameter(): string;
}
