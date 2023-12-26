<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\TasksRestApi\Plugin\GlueApplication;

use Generated\Shared\Transfer\RestTasksAttributesTransfer;
use Pyz\Glue\TasksRestApi\Controller\TasksResourceController;
use Pyz\Glue\TasksRestApi\TasksRestApiConfig;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class TasksResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    /**
     * {@inheritDoc}
     * - Configures available actions for tasks resource.
     *
     * @api
     *
     * @param \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface $resourceRouteCollection
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface
     */
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection): ResourceRouteCollectionInterface
    {
        return $resourceRouteCollection->addPost('post')
            ->addDelete('delete')
            ->addPatch('patch')
            ->addGet('get', false);
    }

    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
//        $getRoute = (new Route('/tasks/list'))
//            ->setDefaults([
//                '_controller' => [TasksResourceController::class, 'getAction'],
//                '_resourceName' => TasksRestApiConfig::RESOURCE_TASKS,
//            ])
//            ->setMethods(Request::METHOD_GET);
//
//        $routeCollection->add('taskGetCollection', $getRoute);

        return $routeCollection;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string
     */
    public function getResourceType(): string
    {
        return TasksRestApiConfig::RESOURCE_TASKS;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string
     */
    public function getController(): string
    {
        return 'tasks-resource';
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string
     */
    public function getResourceAttributesClassName(): string
    {
        return RestTasksAttributesTransfer::class;
    }
}
