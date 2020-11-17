<?php namespace RealHero\Content\Components;

use RealHero\Content\Models\Article;

class CategoryArticles extends \Cms\Classes\ComponentBase
{
    public $articles;

    public function onRender()
    {
        $disabledIds = $this->property('disabledIds', '');

        if (!empty($disabledIds)) {
            $disabledIds = explode(', ', $disabledIds);
        } else {
            $disabledIds = [];
        }

        $model = Article::when($this->property('categoryId', 0) != 0, function ($query) {
            return $query->where('category_id', '=', $this->property('categoryId'));
        });

        if ($this->property('categoryId', 0) != 0) {
            $model->where('category_id', '=', $this->property('categoryId'));
        }

        // Remove slider posts.
        if ($this->property('removeSliderPosts', 0) != 0) {
            $sliderIds = Article::where('show_on_slider', '1')
                ->select('id')
                ->orderBy('created_at', 'desc')
                ->take($this->property('removeSliderPost'))
                ->pluck('id')
                ->toArray();

            $disabledIds = array_merge($disabledIds,  $sliderIds);
        }

        // Remove posts from query 
        // if needed.
        if (!empty($disabledIds)) {
            $model->whereNotIn('id', $disabledIds);
        }

        $this->articles = $model->orderBy('created_at', 'desc')->take($this->property('maxItems', 3))->get();
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
                 'validationMessage' => 'Only numeric symbols!'
            ],
            'categoryId' => [
                'title'             => 'Category id',
                'default'           => '0',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Only numeric symbols!'
            ],
            'disabledIds' => [
                'title'             => 'Disabled id\'s',
                'default'           => '',
                'type'              => 'string',
                'validationPattern' => '^([0-9](, )?)+$',
                'validationMessage' => 'Only numeric symbols (comma separated)!'
            ],
            'removeSliderPosts' => [
                'title'             => 'Remove N slider posts',
                'default'           => '0',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Only numeric symbols!',
            ],
        ];
    }
}