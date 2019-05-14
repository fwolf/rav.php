<?php

namespace Fwolf\Rav\Request;

/**
 * Trait for Request action and module accessors
 *
 * @see         \Fwlib\Web\RequestInterface
 *
 * @copyright   Copyright 2015-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
trait RequestTrait
{
    /**
     * @var string
     */
    protected $action = null;

    /**
     * @var string
     */
    protected $module = null;


    /**
     * @see RequestInterface::getAction()
     */
    public function getAction(): string
    {
        return empty($this->action) ? '' : $this->action;
    }


    /**
     * @see RequestInterface::getModule()
     */
    public function getModule(): string
    {
        return empty($this->module) ? '' : $this->module;
    }


    /**
     * @see RequestInterface::setAction()
     */
    public function setAction(string $action): RequestInterface
    {
        $this->action = $action;

        return $this;
    }


    /**
     * @see RequestInterface::setModule()
     */
    public function setModule(string $module): RequestInterface
    {
        $this->module = $module;

        return $this;
    }
}
