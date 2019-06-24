<?php

namespace Fwolf\Rav\Controller;

use Exception;
use Fwolf\Rav\Action\ActionInterface;
use Fwolf\Rav\Request\RequestAwareTrait;
use Fwolf\Rav\Router\RouterInterface;

/**
 * Controller
 *
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
abstract class AbstractController implements ControllerInterface
{
    use RequestAwareTrait;


    /**
     * @var RouterInterface
     */
    protected $router = null;


    public function createAction(string $actionClass): ActionInterface
    {
        /** @var ActionInterface $action */
        $action = new $actionClass();

        $action->setRequest($this->getRequest());

        return $action;
    }


    public function getRouter(): RouterInterface
    {
        return $this->router;
    }


    /**
     * @inheritDoc
     */
    abstract public function outputError(string $message);


    /**
     * @inheritDoc
     */
    public function outputException(Exception $exception)
    {
        $message = $exception->getMessage();

        if (empty($message)) {
            // Use Exception classname as message, without ending 'Exception'
            $className = get_class($exception);
            $message = substr($className, strrpos($className, '\\') + 1);
            $message = substr($message, 0, strlen($message) - 9);
        }

        return $this->outputError($message);
    }


    /**
     * @inheritDoc
     */
    public function setRouter(RouterInterface $router)
    {
        $this->router = $router;

        return $this;
    }


    /**
     * @inheritDoc
     */
    public function start()
    {
        try {
            $router = $this->getRouter();
            $router->setRequest($this->getRequest());
            $actionClass = $router->getActionClass();

            $action = $this->createAction($actionClass);
            $action->start();
        } catch (Exception $exception) {
            $this->outputException($exception);
        }

        return $this;
    }
}
