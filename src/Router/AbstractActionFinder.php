<?php

namespace Fwolf\Rav\Router;

use Fwolf\Rav\Request\RequestAwareTrait;

/**
 * Find Action class to use
 *
 * @copyright   Copyright 2015-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
abstract class AbstractActionFinder implements ActionFinderInterface
{
    use RequestAwareTrait;

    /**
     * Namespace prefix of Action class
     *
     * @var string
     */
    protected $namespacePrefix = '';


    /**
     * @inheritDoc
     */
    abstract public function getActionClass(): string;


    /**
     * @inheritDoc
     */
    public function getNamespacePrefix(): string
    {
        return $this->namespacePrefix;
    }


    /**
     * @inheritDoc
     */
    public function setNamespacePrefix(string $prefix)
    {
        $this->namespacePrefix = $prefix;

        return $this;
    }
}
