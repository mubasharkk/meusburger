<?php

namespace Pyz\Zed\Task\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * @method \Pyz\Zed\Task\Business\TaskFacade getFacade()
 */
class IndexController extends AbstractController
{
    public function indexAction(): array
    {
        return [
            'data' => $this->getFacade()->getDefaultTask()
        ];
    }

}
