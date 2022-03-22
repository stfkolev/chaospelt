<?php

/**
 * Database Helper class for structuring the database correctly.
 *
 * PHP version 7.4
 *
 * @category Helpers
 * @package  Chaospelt\Helpers
 *
 * @author  Stf Kolev <inkyzfx@gmail.com>
 * @license BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link https://github.com/stfkolev/chaospelt
 */

namespace Chaospelt\Helpers;

use Chaospelt\Kernel\Exceptions\ArgumentNotAClosureException;
use Chaospelt\Kernel\Exceptions\ClosureNoArgumentsException;
use Chaospelt\Kernel\Exceptions\BuilderInvalidCreateUsageException;

use Closure;
use ReflectionFunction;

/**
 * Database Helper class for structuring the database correctly
 * Validator for all type of requests.
 *
 * PHP version 7.4
 *
 * @category Helpers
 * @package  Chaospelt\Helpers
 *
 * @author  Stf Kolev <inkyzfx@gmail.com>
 * @license BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link https://github.com/stfkolev/chaospelt
 */
class Schema
{
    /**
     * The default string length for migrations.
     *
     * @var int
     */
    public static $defaultStringLength = 255;
    
    /**
     * Create a table
     * 
     * @param string $tableName The name of the table to create
     * @param mixed  $callback  The function to use
     * 
     * @return self
     */
    public static function create($tableName, Closure $callback) 
    {
        if ($callback instanceof Closure) {
            $reflectedClosure = new ReflectionFunction($callback);
            
            if (!empty($reflectedClosure->getParameters())) {
                $reflectedParameter = reset($reflectedClosure->getParameters());

                if ($reflectedParameter->getType() == \Chaospelt\Kernel\Database\Blueprint::class) {
                    $resolver = new \Chaospelt\Kernel\Database\Blueprint($tableName);

                    \call_user_func($callback, $resolver);
                }
            } else {
                throw new ClosureNoArgumentsException();
            }
        } else {
            throw new ArgumentNotAClosureException();
        }
    }
}