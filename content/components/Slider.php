<?php namespace RealHero\Content\Components;

use RealHero\Content\Models\Article;

class Slider extends \Cms\Classes\ComponentBase
{
    public $slides;

    public function init()
    {
        $this->slides = Article::where('show_on_slider', '1')->with('category')->get();
    }

    public function componentDetails()
    {
        return [
            'name' => 'Slider',
            'description' => 'Generates slides.'
        ];
    }
}