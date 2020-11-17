<?php namespace RealHero\Content\Models;

use Model;

/**
 * Model
 */
class Type extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'realhero_content_types';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'categories' => [
            'RealHero\Content\Models\Category'
        ]
    ];

}
