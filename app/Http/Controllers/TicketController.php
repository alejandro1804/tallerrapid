<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Ticket;
use App\Models\Binnacle;
use App\Models\Operator;
use App\Models\State;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Laravel\Scout\Searchable;

/**
 * Class TicketController
 * @package App\Http\Controllers
 */
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  /*  public function index()
    {
        $states = State::pluck('name','id');
        $items = Item::pluck('name','id');
        $tickets = Ticket::search(request('search'))->orderBy('id','DES')->paginate(7);
               
       
        $cantidad   = 'Total emitidos   '. Ticket::count() .'______   ';
        $finalizado = 'Total finalizados    '. Ticket::where('state_id' , 2)->count().'    ';
     
        return view('ticket.index', compact('states','tickets','items','cantidad','finalizado'))
             ->with('i', (request()->input('page', 1) - 1) * $tickets->perPage());

    } */
   public function index(Request $request)
{
    $search = $request->get('search');
    $estados = $request->get('estado', []); // Checkboxes seleccionados

    $states = State::pluck('name','id');
    $items = Item::pluck('name','id');

    // Construcción dinámica de la query
    $query = Ticket::with(['state', 'item'])->orderBy('id', 'DESC');

    if ($search) {
        $query->search($search); // si tu modelo usa Laravel Scout o un scope personalizado
    }

    if (!empty($estados)) {
        $query->whereHas('state', function ($q) use ($estados) {
            $q->whereIn('name', $estados);
        });
    }

    $tickets = $query->paginate(7);

    // Contadores
    $cantidad = 'Total emitidos   ' . Ticket::count() . '______   ';
    $finalizado = 'Total finalizados    ' . Ticket::where('state_id', 2)->count() . '    ';

    return view('ticket.index', compact('states','tickets','items','cantidad','finalizado'))
        ->with('i', (request()->input('page', 1) - 1) * $tickets->perPage());
} 


 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $states = State::pluck('name','id');
        $items = Item::pluck('name','id');
        $ticket = new Ticket();
        return view('ticket.create', compact('ticket','items','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ticket::$rules);

        $date = Carbon::now();
        $date->toDateTimeString(); //muestra fecha y hora
        
       // $request->merge(['admission'=>$date]);

        $ticket = Ticket::create($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        $items = Item::pluck('name','id');
        $states = State::pluck('name','id');
     
         return view('ticket.show', compact('ticket','items','states')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states = State::pluck('name','id');
        $items = Item::pluck('name','id');
        $ticket = Ticket::find($id);

        return view('ticket.edit', compact('ticket','items','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        request()->validate(Ticket::$rules);
        $ticket->update($request->all());
        return redirect()->route('tickets.index')
            ->with('success', 'Ticket updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id)->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket deleted successfully');
    }   
    public function inter($id)
    {   
        $binnacle = "" ;

        return redirect()->route('binnacles.index');
    }



}
