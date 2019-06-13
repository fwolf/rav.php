<?php

namespace Fwolf\Rav\Router;

use Fwolf\Rav\Request\RequestInterface;

/**
 * Find Action class to use
 *
 * @copyright   Copyright 2015-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
interface ActionFinderInterface
{
    /**
     * Get result Action class
     */
    public function getActionClass(): string;


    public function getNamespacePrefix(): string;


    public function getRequest(): RequestInterface;


    /**
     * Namespace which Action start with
     *
     * @return  self
     */
    public function setNamespacePrefix(string $prefix);


    /**
     * @return  self
     */
    public function setRequest(RequestInterface $request);
}
