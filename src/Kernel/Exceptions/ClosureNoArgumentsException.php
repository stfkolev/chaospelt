<?php

/**
 * Custom exception for missing Closure arguments.
 *
 * PHP version 7.4
 *
 * @category Exceptions
 * @package  Chaospelt\Kernel\Exceptions
 *
 * @author  Stf Kolev <inkyzfx@gmail.com>
 * @license BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link https://github.com/stfkolev/chaospelt
 */
namespace Chaospelt\Kernel\Exceptions;

use Exception;
use Throwable;

/**
 * Custom exception for missing Closure arguments
 *
 * @category Exceptions
 * @package  Chaospelt\Kernel\Exceptions
 *
 * @author  Stf Kolev <inkyzfx@gmail.com>
 * @license BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link https://github.com/stfkolev/chaospelt
 */
class ClosureNoArgumentsException extends Exception
{
    /**
     * Redefine exception, so the message is not an optional parameter
     *
     * @param string    $message  Message of the Exception
     * @param number    $code     Code of the exception
     * @param Throwable $previous Previously thrown exception
     *
     * @return void
     */
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        $message = 'Closure has no arguments';
        $code = 4414;

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    /**
     * Custom string representation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
