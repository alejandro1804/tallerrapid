<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class Ticket
 *
 * @property $id
 * @property $state
 * @property $admission
 * @property $item_id
 * @property $flaw
 * @property $priority
 * @property $created_at
 * @property $updated_at
 *
 * @property Binnacle[] $binnacles
 * @property Item $item
 * @property Team[] $teams
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ticket extends Model
{
    use Searchable;
    static $rules = [
		'state_id' => 'required',
		'item_id' => 'required',
		'flaw' => 'required',
		'priority' => 'numeric|required|min:1|max:3',
        
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
 
    protected $fillable = ['state_id','admission','item_id','flaw','priority'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function binnacles()
    {
        return $this->hasMany('App\Models\Binnacle', 'ticket_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'id', 'item_id');
    }
     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function state()
    {
        return $this->hasOne('App\Models\State', 'id', 'state_id');
    }
    public function toSearchableArray(): array
    {
        $array = $this->toArray();
 
        // Customize the data array...
        return [
            
            'id' => $this->id,
            'state_id' => $this->state_id,
            
           
            
        ];


 
        return $array;
    }
    

}
