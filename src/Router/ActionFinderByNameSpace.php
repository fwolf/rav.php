<?php

namespace Fwolf\Rav\Router;

use Fwlib\Util\UtilContainer;
use Fwolf\Rav\Router\Exception\ActionNotFoundException;
use Fwolf\Rav\Router\Exception\ModuleOrActionEmptyException;

/**
 * Find Action by its namespace and directory structure
 *
 * @copyright   Copyright 2015-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class ActionFinderByNameSpace extends AbstractActionFinder
{
    /**
     * @inheritDoc
     * @throws ModuleOrActionEmptyException
     * @throws ActionNotFoundException
     */
    public function getActionClass(): string
    {
        $request = $this->getRequest();
        $module = $request->getModule();
        $action = $request->getAction();
        if (empty($module) || empty($action)) {
            throw new ModuleOrActionEmptyException();
        }

        $stringUtil = UtilContainer::getInstance()->getString();

        $namespace = $this->getNamespacePrefix();
        $namespace .= $stringUtil->toStudlyCaps($module) . '\\';

        $actionSections = explode('-', $action);
        $actionSections = array_map(
            [$stringUtil, 'toStudlyCaps'],
            $actionSections
        );

        while (!empty($actionSections)) {
            $class = $namespace . implode('', $actionSections);
            if (class_exists($class)) {
                return $class;
            } else {
                $section = array_shift($actionSections);
                $namespace .= $section . '\\';
            }
        }

        throw new ActionNotFoundException();
    }
}
