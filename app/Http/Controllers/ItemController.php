<?php

namespace App\Http\Controllers;
use App\Models\Sector;
use App\Models\Provider;
use App\Models\Item;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;
//use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

/**
 * Class ItemController
 * @package App\Http\Controllers
 */
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $sectors = Sector::pluck('name','id');
        $providers = Provider::pluck('name','id');
      
        $items = Item::search(request('search'))->orderBy('name','ASC')->paginate(7);
                   
        return view('item.index', compact('items','sectors','providers'))
            ->with('i', (request()->input('page', 1) - 1) * $items->perPage()); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers=Provider::pluck('name','id');
        $sectors=Sector::pluck('name','id');
        $item = new Item();
       
        return view('item.create', compact('item','sectors','providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $primera_en_mayuscula = ucfirst ($request->input('name'));
        $request->merge(['name'=>$primera_en_mayuscula]);
        $trademark = $request->input('trademark');
        $caracteristica = $request->input('characteristic');
        $nota = $request->input('note');

        if ($trademark==NULL){   $request->merge(['trademark'=>' no suministrada ']);                   }

        if ($caracteristica==NULL){   $request->merge(['characteristic'=>' sin comentarios ']);        }   

        if ($nota==NULL){   $request->merge(['note'=>' sin comentarios ']);                              }

        request()->validate(Item::$rules);

        $item = Item::create($request->all());
      
       return redirect()->route('items.index')
            ->with('success', 'Item created successfully.'); 
     }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $providers=Provider::pluck('name','id');
        $sectors=Sector::pluck('name','id');
        $item = Item::find($id);

        return view('item.show', compact('item','sectors','providers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $providers=Provider::pluck('name','id');
        $sectors=Sector::pluck('name','id');
        $item = Item::find($id);

        return view('item.edit', compact('item','sectors','providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $primera_en_mayuscula = ucfirst ($request->input('name'));
        $request->merge(['name'=>$primera_en_mayuscula]);
        request()->validate(Item::$rules);

        $item->update($request->all());

        return redirect()->route('items.index')
            ->with('success', 'Item updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $item = Item::find($id)->delete();

        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully');
    }
}
