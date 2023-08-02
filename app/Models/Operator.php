<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class Operator
 *
 * @property $id
 * @property $name
 * @property $specialty
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Binnacle[] $binnacles
 * @property Team[] $teams
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Operator extends Model
{
    use Searchable;
    
    static $rules = [
		'name' => 'required','unique',
		'position_id' => 'required',
        'phone' => 'numeric|required',
		'status' => 'nullable',
    ];

    protected $perPage = 7;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','position_id','phone','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function binnacles()
    {
        return $this->hasMany('App\Models\Binnacle', 'id', 'operator_id');
    }
    
       public function positions()
    {
        return $this->hasOne('App\Models\Position', 'id', 'position_id');
    } 

    public function toSearchableArray(): array
    {
        $array = $this->toArray();
 
        // Customize the data array...
        return [
            
            'name' => $this->name,
            'status' => $this->status,
        ];
        return $array;
    }
}
