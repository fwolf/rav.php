<?php

namespace Fwolf\Rav\Request;

use Fwlib\Util\Common\HttpUtil;

/**
 * Trait for HTTP Request
 *
 * Will auto load from HTTP GET, and store result.
 *
 * Action/module parameter can be alter by re-define const in child class.
 *
 * @see         HttpRequestInterface
 *
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class HttpRequest extends Request implements HttpRequestInterface
{
    const ACTION_PARAMETER = 'a';

    const MODULE_PARAMETER = 'm';


    public function getAction(): string
    {
        if (is_null($this->action)) {
            $action = $this->getHttpUtil()
                ->getGet(static::ACTION_PARAMETER, '')
            ;

            $this->setAction($action);
        }

        return $this->action;
    }


    public function getActionParameter(): string
    {
        return (static::ACTION_PARAMETER);
    }


    /**
     * For reuse instance
     */
    protected function getHttpUtil(): HttpUtil
    {
        static $httpUtil = null;

        if (is_null($httpUtil)) {
            $httpUtil = HttpUtil::getInstance();
        }

        return $httpUtil;
    }


    public function getModule(): string
    {
        if (is_null($this->module)) {
            $this->module = $this->getHttpUtil()
                ->getGet(static::MODULE_PARAMETER, '')
            ;
        }

        return $this->module;
    }


    public function getModuleParameter(): string
    {
        return (static::MODULE_PARAMETER);
    }
}
