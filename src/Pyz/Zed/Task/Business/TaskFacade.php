<?php

namespace Pyz\Zed\Task\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

class TaskFacade extends AbstractFacade
{

    public function getAnnotations($bundle)
    {
        return $this->getFactory()
            ->createFacadeProxy($bundle)->getAnnotations();
    }

    public function getDefaultTask()
    {
        return $this->getFactory()->createTaskGenerator()->generateTask();
    }
}
