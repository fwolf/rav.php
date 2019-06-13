<?php

namespace Fwolf\Rav\View;

use Fwolf\Rav\View\Exception\ViewDataKeyNotFoundException;

/**
 * Data carrier,
 *
 * Usually data are generated when Action process, and then transfer to View.
 *
 * Key constant of data is defined in Action, as view can be simplify to class
 * name only and Action is always various.
 *
 * Key constant of headers are defined here, Action can call helper method to
 * change headers.
 *
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class ViewDto
{
    const KEY_HEADER_CONTENT_TYPE = 'contentType';


    /**
     * @var array
     */
    protected $data = [];


    /**
     * One header contains 3 part: header, replace, responseCode.
     * Header setter should make sure each row is an array, at lease 1 item.
     *
     * @var array of array
     */
    protected $headers = [];


    /**
     * If this DTO is empty and contains no data & header
     *
     * @var bool
     */
    protected $isEmpty = true;


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


    public function getContentTypeHeader(): ?string
    {
        $header = $this->getHeader(self::KEY_HEADER_CONTENT_TYPE);

        return (is_null($header)) ? null
            : array_shift($header);
    }


    /**
     * Getter of a header row
     */
    public function getHeader(string $key): array
    {
        if (array_key_exists($key, $this->headers)) {
            return $this->headers[$key];
        }

        return [];
    }


    public function getHeaders(): array
    {
        return $this->headers;
    }


    public function isEmpty(): bool
    {
        return $this->isEmpty;
    }


    /**
     * @param mixed $val
     */
    public function set(string $key, $val): self
    {
        $this->setIsNotEmpty();

        $this->data[$key] = $val;

        return $this;
    }


    public function setContentTypeHeader(string $mime): self
    {
        $this->setHeader(
            self::KEY_HEADER_CONTENT_TYPE,
            "Content-Type: $mime"
        );

        return $this;
    }


    /**
     * @param array $args Param $replace and $httpResponseCode of header()
     */
    public function setHeader(string $key, string $val, ...$args): self
    {
        $this->setIsNotEmpty();

        $header = [$val];

        // Max accept 3 param include $val
        if (0 < count($args)) {
            $header[] = array_shift($args);
        }
        if (0 < count($args)) {
            $header[] = array_shift($args);
        }

        $this->headers[$key] = $header;

        return $this;
    }


    public function setHeaders(array $headers): self
    {
        $this->setIsNotEmpty();

        $this->headers = $headers;

        return $this;
    }


    protected function setIsNotEmpty(): self
    {
        $this->isEmpty = false;

        return $this;
    }
}
