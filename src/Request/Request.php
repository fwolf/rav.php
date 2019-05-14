<?php

namespace Fwolf\Rav\Request;

/**
 * @copyright   Copyright 2015-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class Request implements RequestInterface
{
    /**
     * @var string
     */
    protected $action = null;

    /**
     * @var string
     */
    protected $module = null;


    public function getAction(): string
    {
        return empty($this->action) ? '' : $this->action;
    }


    public function getModule(): string
    {
        return empty($this->module) ? '' : $this->module;
    }


    public function setAction(string $action): RequestInterface
    {
        $this->action = $action;

        return $this;
    }


    public function setModule(string $module): RequestInterface
    {
        $this->module = $module;

        return $this;
    }
}
