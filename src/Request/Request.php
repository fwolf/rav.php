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
    protected $defaultAction = 'defaultAction';

    /**
     * @var string
     */
    protected $defaultModule = 'defaultModule';

    /**
     * @var string
     */
    protected $module = null;


    public function getAction(): string
    {
        if (is_null($this->action) && !empty($this->defaultAction)) {
            return $this->defaultAction;
        } else {
            return $this->action;
        }
    }


    public function getModule(): string
    {
        if (is_null($this->module) && !empty($this->defaultModule)) {
            return $this->defaultModule;
        } else {
            return $this->module;
        }
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
