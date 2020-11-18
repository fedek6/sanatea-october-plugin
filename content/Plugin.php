<?php namespace RealHero\Content;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    use \RealHero\Content\Traits\TwigFilters;

    public function registerComponents()
    {
        return [
            'RealHero\Content\Components\CategoriesMenu' => 'categoriesMenu',
            'RealHero\Content\Components\Slider' => 'slider',
            'RealHero\Content\Components\CategoryArticles' => 'categoryArticles',
            'RealHero\Content\Components\SpecialArticles' => 'specialArticles',
        ];
    }

    public function registerSettings()
    {
    }

    /**
     * Register twig stuff.
     * 
     * @link https://octobercms.com/docs/plugin/registration#extending-twig
     */
    public function registerMarkupTags()
    {
        return [
            // Twig filters
            'filters' => [
                /**
                 * Truncate to whole words.
                 * 
                 * @example page.excerpt|raw|striptags|truncateWhole(35)
                 * 
                 * @param string    $text
                 * @param int       $limit
                 * @param string    $separator
                 */
                'truncateWhole'         => [ $this, 'truncateWhole'],

                /**
                 * Remove CSS comments.
                 * 
                 * @param string    $text
                 */
                'removeCssComments'     => [ $this, 'removeCssComments'],
            ],
        ];
    }
}
