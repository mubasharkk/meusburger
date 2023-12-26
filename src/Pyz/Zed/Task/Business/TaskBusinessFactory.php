<?php

namespace Pyz\Zed\Task\Business;

use Pyz\Zed\Task\Business\Model\TaskEntry;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class TaskBusinessFactory extends AbstractBusinessFactory
{
    // Here we will dynamically create facades of modules based on a module name.
    protected function getBundleFacade($bundle)
    {
        $locator = $this->createContainer()->getLocator();
        return $locator->$bundle()->facade();
    }
    // This instantiates our business model and passes the facade inside it.
    public function createFacadeProxy($bundle)
    {
        return new TaskEntry(
            $this->getBundleFacade($bundle)
        );
    }

    public function createTaskGenerator()
    {
        return new TaskGenerator();
    }
}
