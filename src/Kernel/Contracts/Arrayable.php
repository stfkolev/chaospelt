<?php

/**
 * Convertible Type for Collections transformation.
 *
 * PHP version 7.4
 *
 * @category Contracts
 * @package  Chaospelt\Kernel\Contracts
 *
 * @author  Stf Kolev <inkyzfx@gmail.com>
 * @license BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link https://github.com/stfkolev/chaospelt
 */

namespace Chaospelt\Kernel\Contracts;

/**
 * Convertible Type for Collections transformation.
 *
 * @template TKey of array-key
 * @template TValue
 *
 * @category Contracts
 * @package  Chaospelt\Kernel\Contracts
 *
 * @author  Stf Kolev <inkyzfx@gmail.com>
 * @license BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link https://github.com/stfkolev/chaospelt
 */
interface Arrayable
{
    /**
     * Get the instance as an array.
     *
     * @return array<TKey, TValue>
     */
    public function toArray();
}
