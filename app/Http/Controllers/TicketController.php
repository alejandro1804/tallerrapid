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
use TCPDF;

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
  




   public function index(Request $request)
{
    $search = $request->get('search');
    $estados = $request->get('estado', []); // Checkboxes seleccionados

    $fechaInicio = $request->get('fecha_inicio');
    $fechaFin = $request->get('fecha_fin');

    $states = State::pluck('name','id');
    $items = Item::pluck('name','id');

    // Construcción dinámica de la query
    $query = Ticket::with(['state', 'item'])->orderBy('id', 'DESC');

    if ($search) {
        $query->where('id', 'like', '%' . $search . '%'); // asegurate de usar el campo correcto
    }
 
    if (!empty($estados)) {
        $query->whereHas('state', function ($q) use ($estados) {
            $q->whereIn('name', $estados);
        });
    }
    if ($fechaInicio && $fechaFin) {
        $query->whereBetween('admission', [$fechaInicio, $fechaFin]);
    } elseif ($fechaInicio) {
        $query->whereDate('admission', '>=', $fechaInicio);
    } elseif ($fechaFin) {
        $query->whereDate('admission', '<=', $fechaFin);
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
    
/*
public function exportTicketsPDF()
{
    $tickets = Ticket::all(); // Podés aplicar filtros si querés

    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tu Proyecto Laravel');
    $pdf->SetTitle('Listado de Tickets');
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    $content = "<h1>Listado de Tickets</h1><br>";

    foreach ($tickets as $ticket) {
        $content .= "<strong>ID:</strong> {$ticket->id} <br>";
        $content .= "<strong>Descripción:</strong> {$ticket->description}<br>";
        $content .= "<strong>Estado:</strong> {$ticket->status}<br><br>";
    }

    $pdf->writeHTML($content, true, false, true, false, '');

    // Descargar el PDF directamente
    $pdf->Output('tickets.pdf', 'D');
}*/

public function exportTicketsPDF()
{
    $tickets = Ticket::all(); // O aplicá tus filtros personalizados

    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Taller Rapid');
    $pdf->SetTitle('Listado de Tickets');
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    // 👇 Esta es la parte clave que preguntás
    $html = view('ticket.index_pdf', ['tickets' => Ticket::all()])->render();

    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output('tickets.pdf', 'D'); // Lo descarga directamente
}

}
