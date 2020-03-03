<?php namespace Ahorak\Todo;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public $require = ['Octobro.API']; // Attempt to fix CORS issue

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
