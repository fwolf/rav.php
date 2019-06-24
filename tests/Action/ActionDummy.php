<?php

namespace FwolfTest\Rav\Action;

use Fwolf\Rav\Action\AbstractAction;

/**
 * @copyright   Copyright 2019 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class ActionDummy extends AbstractAction
{
    /**
     * @inheritDoc
     */
    public function process()
    {
        return $this;
    }
}
