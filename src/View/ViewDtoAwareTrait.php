<?php

namespace Fwolf\Rav\View;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
trait ViewDtoAwareTrait
{
    /**
     * @var ViewDto
     */
    protected $viewDto = null;


    public function getViewDto(): ViewDto
    {
        if (is_null($this->viewDto)) {
            $this->viewDto = $this->initDefaultViewDto();
        }

        return $this->viewDto;
    }


    protected function initDefaultViewDto(): ViewDto
    {
        return new ViewDto();
    }


    /**
     * @return  self
     */
    public function setViewDto(ViewDto $viewDto)
    {
        $this->viewDto = $viewDto;

        return $this;
    }
}
