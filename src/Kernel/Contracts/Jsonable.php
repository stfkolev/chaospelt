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
 * Convertible type for object transformation.
 *
 * @category Contracts
 * @package  Chaospelt\Kernel\Contracts
 *
 * @author  Stf Kolev <inkyzfx@gmail.com>
 * @license BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link https://github.com/stfkolev/chaospelt
 */
interface Jsonable
{
    /**
     * Convert the object to its JSON representation.
     *
     * @param int $options Options to be used when converting the object
     * 
     * @return string
     */
    public function toJson($options = 0);
}