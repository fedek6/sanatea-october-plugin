<?php namespace RealHero\Content\Models;

use Model;

/**
 * Model
 */
class Advert extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'realhero_content_adverts';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
