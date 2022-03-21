<?php

namespace Chaospelt\Kernel\Traits;

use Chaospelt\Kernel\Concerns\Fluent;
use ReflectionClass;

trait Registerable
{
    public function register_hook($hook, $type, $callback)
    {
        $reflectedConcern = new \ReflectionClass($callback);

        if ($reflectedConcern->implementsInterface(Fluent::class)) {
            $fluentReflection = new ReflectionClass(Fluent::class);
            ("add_$type")($hook, [$callback, reset($fluentReflection->getMethods())->name]);
        }
    }
}
