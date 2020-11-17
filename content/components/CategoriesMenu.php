<?php namespace RealHero\Content\Components;

use RealHero\Content\Models\Type;

class CategoriesMenu extends \Cms\Classes\ComponentBase
{
    public $categories;

    public function init()
    {
        $this->categories = Type::where('show_in_menu', 1)->with('categories')->get();
    }

    public function componentDetails()
    {
        return [
            'name' => 'Categories menu',
            'description' => 'Generates categories menu.'
        ];
    }
}