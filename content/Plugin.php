<?php namespace RealHero\Content;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'RealHero\Content\Components\CategoriesMenu' => 'categoriesMenu',
            'RealHero\Content\Components\Slider' => 'slider',
            'RealHero\Content\Components\CategoryArticles' => 'categoryArticles',
        ];
    }

    public function registerSettings()
    {
    }
}
