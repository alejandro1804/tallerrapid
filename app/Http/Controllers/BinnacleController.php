<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Operator;
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
         $operators = Operator::pluck('name','id');
         $tickets = Ticket::pluck('id','item_id');
       //  $items = Items::pluck('id','name');

        $binnacles = Binnacle::search(request('search'))->orderBy('created_at','DESC')->paginate(7);
            
        return view('binnacle.index', compact('binnacles','tickets','operators'))
           ->with('i', (request()->input('page', 1) - 1) * $binnacles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operators = Operator::pluck('name','id');
        $tickets = Ticket::pluck('id');
        $binnacle = new Binnacle();
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
        request()->validate(Binnacle::$rules);
       // $datee = Carbon::now();
        //$datee->toDateTimeString(); //muestra fecha y hora
        //$request->merge(['timestamp'=>$datee]);
        $binnacle = Binnacle::create($request->all());

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
