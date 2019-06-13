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
    protected $dto = null;


    public function getDto(): ?ViewDto
    {
        return $this->dto;
    }


    public function output(): ViewInterface
    {
        echo $this->getOutput();

        return $this;
    }


    public function setDto(ViewDto $dto): ViewInterface
    {
        $this->dto = $dto;

        return $this;
    }
}
