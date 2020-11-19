<?php namespace RealHero\Content\Components;

use Illuminate\Support\Facades\Input;
use RealHero\Content\Models\Article;

class ArticleSearch extends \Cms\Classes\ComponentBase
{
    public $results;

    public function init()
    {
        $searchQuery = substr(trim(Input::get('q')), 0, 25);

        $this->results = Article::where('text', 'LIKE', "%$searchQuery%")
            ->orWhere('title', 'LIKE', "%$searchQuery%")
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function componentDetails()
    {
        return [
            'name' => 'Article search',
            'description' => 'Searches articles with q param from URL.'
        ];
    }
}