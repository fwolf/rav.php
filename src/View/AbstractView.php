<?php

namespace Fwolf\Rav\View;

/**
 * @copyright   Copyright 2008-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
abstract class AbstractView implements ViewInterface
{
    /**
     * @var ViewDto
     */
    protected $viewDto = null;


    public function getDto(): ?ViewDto
    {
        return $this->viewDto;
    }


    public function output(): ViewInterface
    {
        echo $this->getOutput();

        return $this;
    }


    public function setDto(ViewDto $viewDto): ViewInterface
    {
        $this->viewDto = $viewDto;

        return $this;
    }
}
