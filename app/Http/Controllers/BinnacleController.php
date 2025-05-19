<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Operator;
use App\Models\Item;
use App\Models\Binnacle;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;
//use Carbon\Carbon;

/**
 * Class BinnacleController
 * @package App\Http\Controllers
 */
class BinnacleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                 
         $tickets = Ticket::pluck('id','item_id')->toArray();
         //$tickets = Ticket::with('item')->get();
         $items = Item::pluck('id','name');
         $operators = Operator::pluck('name','id');

        $binnacles = Binnacle::search(request('search'))->orderBy('created_at','DESC')->paginate(7);
        
            
        return view('binnacle.index', compact('binnacles','tickets','items','operators'))
         ->with('i', (request()->input('page', 1) - 1) * $binnacles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
      //  $tickets = Ticket::pluck('id');
        $tickets = Ticket::pluck('id','id')->toArray();
        $operators = Operator::pluck('name','id');
        
        $binnacle = new Binnacle();

     //dd($tickets);
     //dd($tickets->toArray());
        return view('binnacle.create', compact('binnacle','operators','tickets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        print_r ($request->input('ticket_id'));
        //print_r($request->all());



        request()->validate(Binnacle::$rules);
       
       $binnacle = Binnacle::create($request->all());

    //S  dd(Ticket::find($request->ticket_id));  

       //dd($request->ticket_id);
     //  dd($request->all());
        return redirect()->route('binnacles.index')
         ->with('success', 'Binnacle created successfully.');

    }
        
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $operators = Operator::pluck('name','id');
        $tickets = Ticket::pluck('id');
        $binnacle = Binnacle::find($id);

       // echo  ' ............        '. $binnacle ;


        return view('binnacle.show', compact('binnacle','operators','tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operators = Operator::pluck('name','id');
        $tickets = Ticket::pluck('id');
        $binnacle = Binnacle::find($id);
        // echo  ' ............        '. $binnacle ;
        return view('binnacle.edit', compact('binnacle','operators','tickets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Binnacle $binnacle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Binnacle $binnacle)
    {
        request()->validate(Binnacle::$rules);
       // $date = Carbon::now();
       // $date->toDateTimeString(); //muestra fecha y hora
       // $request->merge(['timestamp'=>$date]);
        $binnacle->update($request->all());

        return redirect()->route('binnacles.index')
            ->with('success', 'Binnacle updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $binnacle = Binnacle::find($id)->delete();

        return redirect()->route('binnacles.index')
            ->with('success', 'Binnacle deleted successfully');
    }
}
