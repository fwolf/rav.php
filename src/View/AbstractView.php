<?php

namespace Fwolf\Rav\View;

/**
 * @copyright   Copyright 2008-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
abstract class AbstractView implements ViewInterface
{
    use ViewDtoAwareTrait;

    /**
     * Template file path
     *
     * @var string
     */
    protected $template = '';

    /**
     * Title of View
     *
     * @var string
     */
    protected $title = '';


    public function getTemplate(): string
    {
        return $this->template;
    }


    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return $this->title;
    }


    /**
     * @inheritDoc
     */
    public function output()
    {
        echo $this->getOutput();

        return $this;
    }


    /**
     * @inheritDoc
     */
    public function setTemplate(string $tplFileName)
    {
        $this->template = $tplFileName;

        return $this;
    }


    /**
     * @inheritDoc
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }
}
