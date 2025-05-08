<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Provider;
use App\Models\Item;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;



/**
 * Class PartController
 * @package App\Http\Controllers
 */
class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       
        $items = Item::orderBy('name','ASC')->pluck('name','id');
      
        if (is_numeric(request('search'))){
            $parts = Part::search(request('search'))->where('item_id',request('search'))->orderBy('name','ASC')-> paginate(7);
            
        }else{
           $parts = Part::search(request('search'))->orderBy('name','ASC')-> paginate(7);
        }  

        return view('part.index', compact('parts','items'))
            ->with('i', (request()->input('page', 1) - 1) * $parts->perPage());
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $items=Item::pluck('name','id');
        $providers=Provider::pluck('name','id');
        $part = new Part();
        return view('part.create', compact('part','providers','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nota = $request->input('note');
        if ($nota==NULL){   $request->merge(['note'=>' sin comentarios ']);                              }

        request()->validate(Part::$rules);

        $part = Part::create($request->all());

        return redirect()->route('parts.index')
            ->with('success', 'Part created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    { 
        $items=Item::pluck('name','id');
        $providers=Provider::pluck('name','id');
        $part = Part::find($id);

        return view('part.show', compact('part','providers','items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items=Item::pluck('name','id');     
        $providers=Provider::pluck('name','id');
        $part = Part::find($id);

        return view('part.edit', compact('part','providers','items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Part $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Part $part)
    {
        request()->validate(Part::$rules);

        $part->update($request->all());

        return redirect()->route('parts.index')
            ->with('success', 'Part updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $part = Part::find($id)->delete();

        return redirect()->route('parts.index')
            ->with('success', 'Part deleted successfully');
    }
}
