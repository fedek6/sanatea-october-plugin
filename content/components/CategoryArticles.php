<?php namespace RealHero\Content\Components;

use RealHero\Content\Models\Article;

class CategoryArticles extends \Cms\Classes\ComponentBase
{
    public $articles;

    public function onRender()
    {
        $this->articles = Article::where('category_id', '=', $this->property('categoryId', 1)) 
            ->orderBy('created_at', 'desc')
            ->take($this->property('maxItems', 3))
            ->get();
    }

    public function componentDetails()
    {
        return [
            'name' => 'Category articles',
            'description' => 'Renders articles from category.'
        ];
    }

    public function defineProperties()
    {
        return [
            'maxItems' => [
                 'title'             => 'Max items',
                 'default'           => 3,
                 'type'              => 'string',
                 'validationPattern' => '^[0-9]+$',
                 'validationMessage' => 'The Max Items property can contain only numeric symbols'
            ],
            'categoryId' => [
                'title'             => 'Category id',
                'default'           => 1,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Take posts from category'
           ],
        ];
    }
}