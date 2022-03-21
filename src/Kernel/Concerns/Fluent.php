<?php

/**
 * Interface, used to manage the code more strictly.
 *
 * PHP version 7.4
 *
 * @category Concerns
 *
 * @author   Stf Kolev <inkyzfx@gmail.com>
 * @license  BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link     https://github.com/stfkolev/chaospelt
 */

namespace Chaospelt\Kernel\Concerns;

/**
 * Interface, used to manage the code more strictly.
 *
 * @category Concerns
 *
 * @author   Stf Kolev <inkyzfx@gmail.com>
 * @license  BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link     https://github.com/stfkolev/chaospelt
 */
interface Fluent
{
    /**
     * Used to instantiate the \Registerable Trait.
     *
     * @return none
     */
    public function invoke();
}
