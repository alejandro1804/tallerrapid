<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Position
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Position extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 7;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function operators()
    {
        return $this->hasMany('App\Models\Operator', 'operator_id','id');
    }

}
