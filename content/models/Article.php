<?php namespace RealHero\Content\Models;

use Model;

/**
 * Model
 */
class Article extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    public $jsonable = [ 'text' ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'realhero_content_articles';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * Relations.
     */
    public $belongsTo = [
        'category' => [ 
            'RealHero\Content\Models\Category',
            'key' => 'category_id'
        ],
    ];
}
