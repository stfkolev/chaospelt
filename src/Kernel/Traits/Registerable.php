<?php

/**
 * Trait used for often registering things around Wordpress.
 *
 * PHP version 7.4
 *
 * @category Traits
 *
 * @author   Stf Kolev <inkyzfx@gmail.com>
 * @license  BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link     https://github.com/stfkolev/chaospelt
 */

namespace Chaospelt\Kernel\Traits;

use Chaospelt\Kernel\Concerns\Fluent;
use ReflectionClass;

/**
 * Trait used for often registering things around Wordpress.
 *
 * @category Traits
 *
 * @author   Stf Kolev <inkyzfx@gmail.com>
 * @license  BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link     https://github.com/stfkolev/chaospelt
 */
trait Registerable
{
    /**
     * Used to register Wordpress hooks.
     *
     * @param $hook  Used to specify the name of the hook
     * @param $type  Used to specify the type of the hook
     * @param $class Class that should be used for the closure
     *
     * @return void
     */
    public function registerHook($hook, $type, $class)
    {
        $reflectedConcern = new \ReflectionClass($class);

        if ($reflectedConcern->implementsInterface(Fluent::class)) {
            $fluentReflection = new ReflectionClass(Fluent::class);
            $firstMethod = reset($fluentReflection->getMethods());

            ("add_$type")($hook, [$callback, $firstMethod->name]);
        }
    }
}
