<?php

namespace Fwolf\Rav\Request;

/**
 * @copyright   Copyright 2015-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
trait RequestAwareTrait
{
    /**
     * @var RequestInterface
     */
    protected $request = null;


    public function getRequest(): RequestInterface
    {
        if (is_null($this->request)) {
            $this->request = $this->initDefaultRequest();
        }

        return $this->request;
    }


    protected function initDefaultRequest(): RequestInterface
    {
        return new Request();
    }


    /**
     * @return  self
     */
    public function setRequest(RequestInterface $request)
    {
        $this->request = $request;

        return $this;
    }
}
