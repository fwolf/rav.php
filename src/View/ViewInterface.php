<?php

namespace Fwolf\Rav\View;

/**
 * View interface
 *
 * Generate view content and output.
 *
 * @copyright   Copyright 2013-2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
interface ViewInterface
{
    public function getDto(): ?ViewDto;


    /**
     * Generate output content
     */
    public function getOutput(): string;


    /**
     * Output content
     *
     * @return  self
     */
    public function output();


    /**
     * @return  self
     */
    public function setDto(ViewDto $dto);
}
