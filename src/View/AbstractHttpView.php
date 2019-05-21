<?php

namespace Fwolf\Rav\View;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
abstract class AbstractHttpView extends AbstractView
{
    /**
     * Deal with http header before output
     */
    public function output(): ViewInterface
    {
        $this->outputHttpHeaders();

        return parent::output();
    }


    protected function outputHttpHeaders()
    {
        $dto = $this->getDto();
        if (is_null($dto)) {
            return;
        }

        $headers = $dto->getHeaders();
        foreach ($headers as $header) {
            switch (count($header)) {
                case 1:
                    header(array_shift($header));
                    break;
                case 2:
                    header(array_shift($header), array_shift($header));
                    break;
                case 3:
                    header(
                        array_shift($header),
                        array_shift($header),
                        array_shift($header)
                    );
                    break;
            }
        }
    }
}
