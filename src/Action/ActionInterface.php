<?php

namespace Fwolf\Rav\Action;

use Fwolf\Rav\Request\RequestInterface;

/**
 * Action interface
 *
 * Action is index of of logic implement, include how Request is processed,
 * which service should call, which data are prepared for View, and which View
 * should be used. So Action should prepare View instance, include create and
 * assign dto, and call it for output. The real View is mainly on template,
 * View class is considered as category of View.
 *
 * @copyright   Copyright 2013-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
interface ActionInterface
{
    public function getRequest(): RequestInterface;


    /**
     * Use view to output
     *
     * @return  self
     */
    public function output();


    /**
     * Main logic process
     *
     * @return  self
     */
    public function process();


    /**
     * @return  self
     */
    public function setRequest(RequestInterface $request);


    /**
     * Main entrance, connect process and output
     *
     * @return  self
     */
    public function start();
}
