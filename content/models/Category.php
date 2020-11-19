<?php namespace RealHero\Content\Models;

use Model;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'realhero_content_categories';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * Relations.
     */
    public $belongsTo = [
        'type' => [ 
            'RealHero\Content\Models\Type',
            'key' => 'type_id'
        ],
    ];

    public $hasMany = [
        'articles' => [
            'RealHero\Content\Models\Article'
        ]
    ];

    /**
     * Scope a query to only include users of a given type.
     */
    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}
