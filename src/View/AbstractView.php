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

    /**
     * Title of View
     *
     * @var string
     */
    protected $title = '';


    /**
     * @inheritDoc
     */
    public function getDto(): ?ViewDto
    {
        return $this->dto;
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
    public function output(): ViewInterface
    {
        echo $this->getOutput();

        return $this;
    }


    /**
     * @inheritDoc
     */
    public function setDto(ViewDto $dto)
    {
        $this->dto = $dto;

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
