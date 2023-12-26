<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\TasksRestApi;

use Pyz\Glue\TasksRestApi\Processor\Mapper\TaskMapper;
use Pyz\Glue\TasksRestApi\Processor\Mapper\TaskMapperInterface;
use Pyz\Glue\TasksRestApi\Processor\RestResponseBuilder\TaskRestResponseBuilder;
use Pyz\Glue\TasksRestApi\Processor\RestResponseBuilder\TaskRestResponseBuilderInterface;
use Spryker\Glue\Kernel\Backend\AbstractFactory;

class TasksRestApiFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Glue\TasksRestApi\Processor\Mapper\TaskMapperInterface
     */
    public function createTaskMapper(): TaskMapperInterface
    {
        return new TaskMapper();
    }

    /**
     * @return \Pyz\Glue\TasksRestApi\Processor\RestResponseBuilder\TaskRestResponseBuilderInterface
     */
    public function createTaskRestResponseBuilder(): TaskRestResponseBuilderInterface
    {
        return new TaskRestResponseBuilder($this->getResourceBuilder(), $this->createTaskMapper());
    }
}
