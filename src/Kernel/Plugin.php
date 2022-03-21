<?php

namespace Chaospelt\Kernel;

use Chaospelt\Kernel\Traits\Registerable;
use Chaospelt\Kernel\View;
use Chaospelt\Kernel\Facades\RegisterTypes;

abstract class Plugin 
{
    use Registerable;

    public function __construct($pluginFile) 
    {
        $calledClass = get_called_class();
        
        register_activation_hook($pluginFile, $calledClass, 'activate');
        register_deactivation_hook($pluginFile, $calledClass, 'deactivate');
    }

    abstract static protected function activate();
    abstract static protected function deactivate();
}