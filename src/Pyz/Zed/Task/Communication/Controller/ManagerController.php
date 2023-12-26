<?php

namespace Pyz\Zed\Task\Communication\Controller;

use Symfony\Component\HttpFoundation\Request;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

class ManagerController extends AbstractController
{
    // This action will be used to show documentation of a facade.
    public function docAction(Request $request)
    {
        return 'docAction';
    }
    // This action will be used to show documentation of a transfer object.
    public function docTransferAction(Request $request)
    {
        return 'docTransferAction';
    }

    public function indexAction()
    {
        return "demo";
    }
}
