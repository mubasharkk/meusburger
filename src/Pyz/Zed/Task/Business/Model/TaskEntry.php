<?php

namespace Pyz\Zed\Task\Business\Model;

use Spyryker\Zed\Module\Business\AbstractFacade;
use ReflectionClass;
use ReflectionMethod;
use ReflectionType;

class TaskEntry
{

    protected $wrappedFacade;

    public function __construct(AbstractFacade $wrappedFacade)
    {
        $this->wrappedFacade = $wrappedFacade;
    }

    public function getAnnotations()
    {
        $className = get_class($this->wrappedFacade); // Locator returns an instance, reflection needs a class name.
        $reflection = new ReflectionClass($className);
        return $this->getPublicInterfaceAnnotations($reflection);
    }

    protected function getPublicInterfaceAnnotations(ReflectionClass $reflection)
    {
        $result = [];
        // Go through all public methods of the facade.
        foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            // Docstring lookup in interfaces implemented by the facade.
            $docDomment = $method->getDocComment();
            if (stripos($docDomment, '@inheritdoc') !== false) {
                foreach ($reflection->getInterfaces() as $interface) {
                    if ($interface->hasMethod($method->getName())) {
                        $docDomment = $interface->getMethod($method->getName())->getDocComment();
                        break;
                    }
                }
            }
            // As result we build an array from the doc-string and parameters.
            $result[$method->getName()] = [
                'docString' => $docDomment,
                'parameters' => $this->annotateIncomingParameters($method),
            ];
        }

        return $result;
    }

    protected function annotateIncomingParameters(ReflectionMethod $method)
    {
        $result = [];
        foreach ($method->getParameters() as $parameter) {
            $result[$parameter->getName()] = $this->annotateType($parameter->getType(), $parameter->getClass());
        }
        return $result;
    }
    protected function annotateType(ReflectionType $type = null, ReflectionClass $class = null)
    {
        return [
            'type' => $class !== null ? $class->getName() : $type,
            'isTransfer' => $class !== null ? $class->isSubclassOf('Spryker\Shared\Transfer\AbstractTransfer') : false,
        ];
    }
}
