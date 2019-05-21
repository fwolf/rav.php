<?php

namespace Fwolf\Rav\View;

use Fwolf\Rav\View\Exception\ViewDataKeyNotFoundException;

/**
 * Data carrier, from action to view
 *
 * Data is organized by key, defined by const in Action. As view can be
 * simplify and Action is always various, so put const in Action.
 *
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class ViewDto
{
    const KEY_HEADER_MIME = 'mime';


    /**
     * @var array
     */
    protected $data = [];


    /**
     * @var array
     */
    protected $headers = [];


    /**
     * @return  mixed
     * @throws  ViewDataKeyNotFoundException
     */
    public function get(string $key)
    {
        if (!array_key_exists($key, $this->data)) {
            throw new ViewDataKeyNotFoundException(
                "Data key $key not found"
            );
        }

        return $this->data[$key];
    }


    public function getHeader(string $key): ?string
    {
        if (array_key_exists($key, $this->headers)) {
            return $this->headers[$key];
        }

        return null;
    }


    public function getMimeHeader(): ?string
    {
        return $this->getHeader(self::KEY_HEADER_MIME);
    }


    /**
     * @param mixed $val
     */
    public function set(string $key, $val): self
    {
        $this->data[$key] = $val;

        return $this;
    }


    public function setHeaders(string $key, string $val): self
    {
        $this->headers[$key] = $val;

        return $this;
    }


    public function setMimeHeader(string $mime): self
    {
        $this->headers[self::KEY_HEADER_MIME] = $mime;

        return $this;
    }
}
