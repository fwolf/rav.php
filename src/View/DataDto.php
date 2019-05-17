<?php

namespace Fwolf\Rav\View;

use Fwolf\Rav\View\Exception\DataKeyNotFoundException;

/**
 * Data carrier, from action to view
 *
 * Data is organized by key, defined by const in Action. As view can be
 * simplify and Action is always various, so put const in Action.
 *
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class DataDto
{
    /**
     * @var array
     */
    protected $data = [];


    /**
     * @return  mixed
     * @throws  DataKeyNotFoundException
     */
    public function get(string $key)
    {
        if (!array_key_exists($key, $this->data)) {
            throw new DataKeyNotFoundException(
                "Data key $key not found"
            );
        }

        return $this->data[$key];
    }


    /**
     * @param mixed  $val
     */
    public function set(string $key, $val): self
    {
        $this->data[$key] = $val;

        return $this;
    }
}
