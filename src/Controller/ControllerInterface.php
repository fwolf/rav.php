<?php

namespace Fwolf\Rav\Controller;

use Exception;
use Fwolf\Rav\Action\ActionInterface;
use Fwolf\Rav\Request\RequestInterface;
use Fwolf\Rav\Router\RouterInterface;

/**
 * Controller interface
 *
 * Load Router, catch and deal with global exception.
 *
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
interface ControllerInterface
{
    public function createAction(string $actionClass): ActionInterface;


    public function getRequest(): RequestInterface;


    public function getRouter(): RouterInterface;


    /**
     * @return  self
     */
    public function outputError(string $message);


    /**
     * @return  self
     */
    public function outputException(Exception $exception);


    /**
     * @return  self
     */
    public function setRequest(RequestInterface $request);


    /**
     * @return  self
     */
    public function setRouter(RouterInterface $router);


    /**
     * Main entrance
     *
     * @return  self
     */
    public function start();
}
