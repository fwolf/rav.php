<?php

namespace Fwolf\Rav\Action;

use Fwolf\Rav\Request\RequestAwareTrait;
use Fwolf\Rav\View\ViewDtoAwareTrait;
use Fwolf\Rav\View\ViewInterface;

/**
 * Abstract Action
 *
 * Called by Router, process business logic, then use View to do output.
 *
 * @copyright   Copyright 2008-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
abstract class AbstractAction implements ActionInterface
{
    use RequestAwareTrait;
    use ViewDtoAwareTrait;


    /**
     * Title of View
     *
     * @var string
     */
    protected $title = '';

    /**
     * Which View should load for output
     *
     * @var string
     */
    protected $viewClass = '';

    /**
     * Which template View should use
     *
     * If use common View, use this template to diff output. If use specific
     * View, this may leave empty.
     *
     * @var string
     */
    protected $viewTemplate = '';


    protected function getTitle(): string
    {
        return $this->title;
    }


    protected function getViewClass(): string
    {
        return $this->viewClass;
    }


    protected function getViewTemplate(): string
    {
        return $this->viewTemplate;
    }


    protected function initView(string $viewClass): ViewInterface
    {
        $view = new $viewClass();

        return $view;
    }


    /**
     * @inheritDoc
     */
    public function output()
    {
        $view = $this->initView($this->getViewClass());

        $view->setTitle($this->getTitle())
            ->setTemplate($this->getViewTemplate())
            ->setViewDto($this->getViewDto())
        ;

        $view->output();

        return $this;
    }


    /**
     * @inheritDoc
     */
    abstract public function process();


    /**
     * @param mixed $val
     * @return  self
     */
    protected function setViewData(string $key, $val)
    {
        $viewDto = $this->getViewDto();

        $viewDto->set($key, $val);

        return $this;
    }


    /**
     * @inheritDoc
     */
    public function start()
    {
        $this->process()
            ->output()
        ;

        return $this;
    }
}
