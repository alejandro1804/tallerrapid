<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class Binnacle
 *
 * @property $id
 * @property $ticket_id
 * @property $operator_id
 * @property $note
 * @property $created_at
 * @property $updated_at
 *
 * @property Operator $operator
 * @property Ticket $ticket
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Binnacle extends Model
{
    use Searchable;
    
    static $rules = [ 
           // 'ticket_id' => 'required|exists:tickets,id',
		   // 'operator_id' => 'required|exists:operators,id',
		    'note' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ticket_id','item_id','operator_id','created_at','note'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function operator()
    {
       // return $this->belongsTo('App\Models\Operator', 'id', 'operator_id');
        return $this->belongsTo(Operator::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticket()
    {
      //  return $this->belongsTo('App\Models\Ticket', 'id', 'ticket_id');
       return $this->belongsTo(Ticket::class);


    }
   
    /*
    public function toSearchableArray(): array
    {
        $array = $this->toArray();
 
        // Customize the data array...
        return [
            
            'ticket_id' => $this->ticket_id,
          //'item.name' =>' ',
        ];

        return $array; 
    }   */

}
