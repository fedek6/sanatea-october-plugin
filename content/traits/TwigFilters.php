<?php namespace RealHero\Content\Traits;
use \Illuminate\Support\Str;

trait TwigFilters 
{
    /**
     * Truncate to whole words.
     * 
     * @example page.excerpt|raw|striptags|truncateWhole(35)
     * 
     * @param string    $text
     * @param int       $limit
     * @param string    $separator
     * 
     * @return string
     */
    public function truncateWhole($text, $limit, $separator = '...') {
        return Str::words($text, $limit, $separator);
    }

    /**
     * Remove CSS comments.
     * 
     * @example page.excerpt|raw|striptags|truncateWhole(35)
     * 
     * @param string    $text
     * 
     * @return string
     */
    public function removeCssComments($text) {
        $pattern = '|\/\*[=#\da-z\. ]+\*\/|i';

        return preg_replace($pattern, '', $text);
    }
}