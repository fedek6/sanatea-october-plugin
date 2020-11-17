<?php namespace RealHero\Content;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'RealHero\Content\Components\CategoriesMenu' => 'categoriesMenu',
        ];
    }

    public function registerSettings()
    {
    }
}
