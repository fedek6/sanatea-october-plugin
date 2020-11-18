<?php namespace RealHero\Content\Components;

use RealHero\Content\Models\Type;

class CategoriesMenu extends \Cms\Classes\ComponentBase
{
    public $categories;

    public function init()
    {
        // Show only categories with content
        $this->categories = Type::where('show_in_menu', 1)
            ->with(['categories' => function($q) {
                $q->whereHas('articles');
            }])
            ->get();
    }

    public function componentDetails()
    {
        return [
            'name' => 'Categories menu',
            'description' => 'Generates categories menu.'
        ];
    }
}