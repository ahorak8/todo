<?php namespace Ahorak\Todo\Models;

use Model;

/**
 * Model
 */
class Todo extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $fillable = ['title', 'description', 'status'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ahorak_todo_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
