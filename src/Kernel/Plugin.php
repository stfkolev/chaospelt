<?php

/**
 * Abstract class, used as the core for the plugin development.
 * 
 * PHP version 7.4
 * 
 * @category Facades
 * @package  Chaospelt\Kernel\Facades
 * @author   Stf Kolev <inkyzfx@gmail.com>
 * @license  BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 * @link     https://github.com/stfkolev/chaospelt
 */

namespace Chaospelt\Kernel;

use Chaospelt\Kernel\Traits\Registerable;

/**
 * Abstract class, used as the core for the plugin development.
 * 
 * PHP version 7.4
 * 
 * @category Facades
 * @package  Chaospelt\Kernel\Facades
 * @author   Stf Kolev <inkyzfx@gmail.com>
 * @license  BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 * @link     https://github.com/stfkolev/chaospelt
 */
abstract class Plugin
{
    use Registerable;

    /**
     * Registers activation and deactivation hook for the called class.
     * 
     * @param $pluginFile - Plugin File Path. Used for proper Wordpress hooking.
     * 
     * @return Plugin object
     */
    public function __construct($pluginFile)
    {
        $calledClass = get_called_class();
        
        register_activation_hook($pluginFile, $calledClass, 'activate');
        register_deactivation_hook($pluginFile, $calledClass, 'deactivate');
    }

    /**
     * Used for the activation hook in Wordpress.
     * 
     * @return void
     */
    abstract static protected function activate();

    /**
     * Used for the deactivation hook in Wordpress.
     * 
     * @return void
     */
    abstract static protected function deactivate();
}