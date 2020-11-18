<?php namespace RealHero\Content\Components;

use RealHero\Content\Models\Article;

class SpecialArticles extends \Cms\Classes\ComponentBase
{
    public $articles;

    public function init()
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

        // Remove posts from query 
        // if needed.
        if (!empty($disabledIds)) {
            $model->whereNotIn('id', $disabledIds);
        }

        // Posts type
        if ($this->property('articleType', 'standard') != 'all') {
            $model->where('type', $this->property('articleType'));
        }

        // How many posts?
        $model->take($this->property('maxItems', 3));

        // Offset
        if ($this->property('offsetItems', 0) != 0) {
            $model->skip($this->property('offsetItems'));
        }
        
        $this->articles = $model->orderBy('created_at', 'desc')->get();
    }

    public function componentDetails()
    {
        return [
            'name' => 'Special articles',
            'description' => 'Renders special articles.'
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
            'offsetItems' => [
                'title'             => 'Starting post record',
                'default'           => 0,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Only numeric symbols!'
            ],
            'articleType' => [
                'title'             => 'Type of articles',
                'default'           => 'standard',
                'type'              => 'dropdown',
                'options'           => [
                    'at_time'               => 'At time',
                    'editor_recommended'    => 'Recommended by editor',
                    'standard'              => 'Standard',
                    'all'                   => 'All',
                ]
            ],
            'template' => [
                'title'             => 'Template type',
                'default'           => 'two-columns',
                'type'              => 'dropdown',
                'options'           => [
                    'two-columns'           => 'Two columns',
                    'editor-recommended'    => 'Recommended by editor',
                ]
            ],
            'disabledIds' => [
                'title'             => 'Disabled id\'s',
                'default'           => '',
                'type'              => 'string',
                'validationPattern' => '^([0-9](, )?)+$',
                'validationMessage' => 'Only numeric symbols (comma separated)!'
            ],
        ];
    }
}