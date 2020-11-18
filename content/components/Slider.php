<?php namespace RealHero\Content\Components;

use RealHero\Content\Models\Article;

class Slider extends \Cms\Classes\ComponentBase
{
    public $slides;

    public function init()
    {
        $this->slides = Article::where('show_on_slider', '1')
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->take($this->property('maxItems', 10))
            ->get();
    }

    public function componentDetails()
    {
        return [
            'name' => 'Slider',
            'description' => 'Generates slides.'
        ];
    }

    public function defineProperties()
    {
        return [
            'maxItems' => [
                 'title'             => 'Max items',
                 'default'           => 10,
                 'type'              => 'string',
                 'validationPattern' => '^[0-9]+$',
                 'validationMessage' => 'The Max Items property can contain only numeric symbols'
            ]
        ];
    }

    public function render() {
        return 'dupa';
    }
}