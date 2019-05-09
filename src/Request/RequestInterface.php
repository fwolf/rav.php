<?php

namespace Fwolf\Rav\Request;

/**
 * Request informer
 *
 * Abstract layer of user request in app, http or cli or else.
 *
 *
 * Action value will be parsed by Router, to determine which Action class it
 * should call.
 *
 * Module can be consider as group of action, help to organize Action class
 * and files in large project. Module - action is two level hierarchical,
 * enough for common project.
 *
 * @copyright   Copyright 2015-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
interface RequestInterface
{
    /**
     * Getter of action value
     */
    public function getAction(): string;


    /**
     * Getter of module value
     */
    public function getModule(): string;


    /**
     * Setter of action value
     */
    public function setAction(string $action): self;


    /**
     * Setter of module value
     */
    public function setModule(string $module): self;
}
