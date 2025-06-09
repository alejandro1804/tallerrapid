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
        $ticket_id = request('id'); // Obtiene el id del ticket
        
        $tickets = Ticket::with('item')->findOrFail($ticket_id);
        $operators = Operator::pluck('name', 'id');
        $binnacles = Binnacle::where('ticket_id', $ticket_id)->paginate(7);

        return view('binnacle.index', compact('binnacles', 'tickets', 'operators','ticket_id'))
            ->with('i', (request()->input('page', 1) - 1) * $binnacles->perPage());
    }
    
    public function create()
    {
        
        $tickets = Ticket::pluck('id','id')->toArray();
        $operators = Operator::pluck('name','id');
        $binnacle = new Binnacle();
      
        $modo = "CREAR";

        return view('binnacle.create', compact('binnacle','operators','tickets','modo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
       // print_r($request->all());

        $identificador = $request->input('ticket_id');


      
        request()->validate(Binnacle::$rules);
        $binnacle = Binnacle::create($request->all());

      //dd(Ticket::find($request->ticket_id));  

        return redirect()->route('binnacles.index',['id' => $identificador])
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
       // echo 'en function edit : ' .$binnacle->ticket_id;
        
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
       //echo "identificador en function update : " . $identificador = $request->input('ticket_id');
   // echo $request->all();

        $binnacle->update($request->all());

      // echo $identificador = $request->input('ticket_id'); // Obtiene el id del ticket


        return redirect()->route('binnacles.index',['id' => $identificador])
            ->with('success', 'Binnacle updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
       // echo $identificador = $request->input('ticket_id'); 

        $binnacle = Binnacle::find($id)->delete();

        return redirect()->route('binnacles.index',$id)
            ->with('success', 'Binnacle deleted successfully');
    }
}
