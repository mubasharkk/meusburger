<?php

namespace Pyz\Zed\Task\Communication\Controller;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class V1Controller extends AbstractController
{
    // This action will be used to show documentation of a facade.
    public function docAction(Request $request)
    {
        return [
            'annotations' => $this->getFacade()->getAnnotations(
                $request->get('bundle')
            )
        ];
    }

    // This action will be used to show documentation of a transfer object.
    public function docTransferAction(Request $request)
    {
        return 'docTransferAction';
    }

    public function executeAction(Request $request)
    {
        return new JsonResponse($this->resultToArray(
            $this->getFacade()->callBundleMethod(
                $request->get('bundle'),
                $request->get('method'),
                $request->get('arguments', [])
            )
        ));
    }
    protected function resultToArray($mixed)
    {
        if (is_scalar($mixed)) {
            return $mixed;
        }
        if ($mixed instanceof AbstractTransfer) {
            return $mixed->toArray(true);
        }
        if (is_array($mixed)) {
            $result = [];
            foreach ($mixed as $key => $value) {
                $result[$key] = $this->resultToArray($value);
            }
            return $result;
        }
        if ($mixed === null) {
            return null;
        }
        throw new \InvalidArgumentException();
    }
}
