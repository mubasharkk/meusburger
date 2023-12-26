<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\TasksRestApi\Controller;

use Generated\Shared\Transfer\GlueResponseTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponse;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method \Pyz\Glue\TasksRestApi\TasksRestApiFactory getFactory()
 */
class TasksResourceController extends AbstractController
{
    public function getAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        dd($restRequest->getResource());
        return (new RestResponse);
    }
}
