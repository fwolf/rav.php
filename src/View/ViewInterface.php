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
    /**
     * Generate output content
     */
    public function getOutput(): string;


    /**
     * Getter of View template file name
     */
    public function getTemplate(): string;


    /**
     * Getter of View title
     */
    public function getTitle(): string;


    public function getViewDto(): ?ViewDto;


    /**
     * Output content
     *
     * @return  self
     */
    public function output();


    /**
     * Setter of View template file name
     *
     * @return  self
     */
    public function setTemplate(string $tplFileName);


    /**
     * Setter of View title
     *
     * @return  self
     */
    public function setTitle(string $title);


    /**
     * @return  self
     */
    public function setViewDto(ViewDto $viewDto);
}
