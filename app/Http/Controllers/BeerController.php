<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;
use App\Http\Requests\BeerRequest;
use Illuminate\Support\Facades\Auth;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beers = Beer::paginate(12);
        return view ('beers.index', ['beers' => $beers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('beers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeerRequest $request)
    {
        //$beer = Beer::create ($request->validated())->saveOrFail();
        $beer = Beer::create ([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'country' => $request->country,
            'brand' => $request->brand,
            'vol' => $request->vol
        ]);

        return redirect()->route('beers.index')->with ('success', 'Hemos guardado corectamente la cerveza');
    }

    /* public function store(BrewerieRequest $request) {
name' => 'required|min:4|max:100',
            'description' => 'required|min:10|max:1000',
            'country' => 'required|min:4|max:100',
            'brand' => 'required|min:4|max:100',
            'vol' =>
        $brewerie = Brewerie::create ([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'url' => $img
        ]);

        $brewerie->saveOrFail();

        return redirect()->route('breweriehome')->with ('success', 'Los datos de la cervecería han sido enviados.');

    } */




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function show(Beer $beer)
    {
        return view ('beers.show', compact('beer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function edit(Beer $beer)
    {
        return view ('beers.edit', compact('beer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function update(BeerRequest $request, Beer $beer)
    {
        $beer->fill($request->validated())->saveOrFail();
        return redirect()->route('beers.index')->with ('success', 'Hemos guardado corectamente la cerveza');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beer $beer)
    {
        $beer->delete();
        return redirect()->route('beers.index')->with ('success', 'Hemos borrado corectamente la cerveza');

    }
}
